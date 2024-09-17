<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\CardResource;
use App\Models\Property;

class RecentPropertiesService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties_1';

    protected $request;
    protected $key_cache_viewed_properties;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->key_cache_viewed_properties = config('app.cache.viewed_properties');
    }

    public function addProperty($id, $title, $slug)
    {
        $recentlyViewed = $this->getRecentlyViewedCookie();
        // Añadir la propiedad actual al inicio del array
        $recentlyViewedCookie = array_filter($recentlyViewed, function ($item) use ($id) {
            return $item["id"] != $id;
        });
        array_unshift($recentlyViewedCookie, ['id' => $id, 'title' => $title, 'slug' => $slug]);
        // Limitar a las 6 más recientes
        $recentlyViewedCookie = array_slice($recentlyViewedCookie, 0, self::MAX_VIEWED);
        $this->setRecentlyViewed($recentlyViewedCookie);
        return $recentlyViewedCookie;
    }
    public function getRecentlyViewedCookie()
    {
        $cookie = json_decode($this->request->cookie(self::COOKIE_NAME), true) ?? [];
        if ($cookie) {
            return $cookie;
        } else {
            return [];
        }
    }
    public function getViewedData()
    {
        // $sufixCache = implode('-', $ids);
        $ids = [];
        $cookie = $this->getRecentlyViewedCookie();
        if ($cookie) {
            foreach ($cookie as $key => $value) {
                if (isset($value["id"])) {
                    $ids[] = $value["id"];
                }
            }
        }
        if (count($ids) > 0) {
            return Cache::rememberForever($this->key_cache_viewed_properties, function () use ($ids) {
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
        }else{
            return [];
        }
    }
    protected function setRecentlyViewed($recentlyViewed)
    {
        $this->cleanCache();
        cookie()->queue(self::COOKIE_NAME, json_encode($recentlyViewed), 0);
    }
    private function cleanCache()
    {
        Cache::forget($this->key_cache_viewed_properties);
    }
}
