<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecentPropertiesService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties';

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
        return json_decode($this->request->cookie(self::COOKIE_NAME), true) ?? [];
    }

    protected function setRecentlyViewed($recentlyViewed)
    {
        cookie()->queue(self::COOKIE_NAME, json_encode($recentlyViewed), 60 * 24 * 30); //POR 30 DÍAS
    }
}
