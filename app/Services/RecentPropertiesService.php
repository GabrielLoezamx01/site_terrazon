<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\CardResource;
use App\Models\Property;

class RecentPropertiesService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties';

    protected $request;
    protected $key_cache_home_properties;
    protected $key_cache_viewed_properties;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->key_cache_home_properties = config('app.cache.home_properties');
        $this->key_cache_viewed_properties = config('app.cache.viewed_properties');
    }

    public function addProperty($id, $title, $slug)
    {
        $recentlyViewed = $this->getRecentlyViewed();

        // Añadir la propiedad actual al inicio del array
        $recentlyViewed = array_filter($recentlyViewed, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        array_unshift($recentlyViewed, ['id' => $id, 'title' => $title, 'slug' => $slug]);

        // Limitar a las 6 más recientes
        $recentlyViewed = array_slice($recentlyViewed, 0, self::MAX_VIEWED);

        $this->setRecentlyViewed($recentlyViewed);

        return $recentlyViewed;
    }

    public function getRecentlyViewed()
    {
        $cookie = json_decode($this->request->cookie(self::COOKIE_NAME), true) ?? [];
        $properties = [];
        if ($cookie) {
            $ids = [];
            $data = [];
            foreach ($cookie as $key => $value) {
                if (isset($value["id"])) {
                    $ids[] = $value["id"];
                }
            }
            $sufixCache = implode('-', $ids);
            $key = $this->key_cache_home_properties . $sufixCache;
            $properties = Cache::remember($key, 60 * 30 * 30, function () use ($ids) {
                $item = Property::whereIn('id', $ids)->get();
                foreach ($item as $value2) {
                    $card = new CardResource($value2);
                    $data[] = $card;
                }
                usort($data, function ($a, $b) use ($ids) {
                    $posA = array_search($a->id, $ids);
                    $posB = array_search($b->id, $ids);
                    return $posA - $posB;
                });
                return $data;
            });
        }
        return $properties;
    }

    protected function setRecentlyViewed($recentlyViewed)
    {
        cookie()->queue(self::COOKIE_NAME, json_encode($recentlyViewed), 60 * 24 * 30); //POR 30 DÍAS
    }
}
