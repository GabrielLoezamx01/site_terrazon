<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Site\HomeProperty;
use App\Http\Resources\CardResource;
use App\Models\Property;
use App\Services\RecentPropertiesService;
use App\Services\FiltersService;

class HomeController extends Controller
{
    protected $key_cache_home_properties;
    protected $key_cache_viewed_properties;
    protected $recentPropertiesService;
    protected $filtersService;
    function __construct(
        RecentPropertiesService $recentPropertiesService,
        FiltersService $filtersService
    ) {
        $this->recentPropertiesService = $recentPropertiesService;
        $this->filtersService = $filtersService;
        $this->key_cache_home_properties = config('app.cache.home_properties');
        $this->key_cache_viewed_properties = config('app.cache.viewed_properties');
    }
    private function getRecentlyViewed()
    {
        $listViewed = $this->recentPropertiesService->getRecentlyViewed();
        $properties = [];
        if ($listViewed) {
            $ids = [];
            $data = [];
            foreach ($listViewed as $key => $value) {
                $ids[] = $value["id"];
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
    private function getPropertiesList()
    {
        return Cache::rememberForever($this->key_cache_viewed_properties, function () {
            $homeProperties = HomeProperty::with([
                'property' => function ($query) {
                    $query->where('available', 1);
                },
                'home'
            ])->get();
            return  $homeProperties->groupBy('home.name');
        });
    }
    public function index()
    {

        $groupedProperties = $this->getPropertiesList();
        $ubicaciones = $this->filtersService->getListUbicaciones();
        $typesProperties = $this->filtersService->getListTiposPropiedad();
        $range = $this->filtersService->getListBudget();
        $home = [];

        foreach ($groupedProperties as $key => $item) {

            $data = [];
            $homeItem = ['name' => $key];

            foreach ($item as $value) {
                if (isset($value->home)) {
                    $homeItem['span'] = $value->home->span;
                }
                if (isset($value->property)) {
                    $card = new CardResource($value->property);
                    $data[] = $card;
                }
            }

            $homeItem['cards'] = $data;
            $home[] = $homeItem;
        }
        $viewed = $this->getRecentlyViewed();
        return view('public.home', [
            'range' => $range,
            'ubicaciones' => $ubicaciones,
            'typesProperties' => $typesProperties,
            'viewed' => $viewed,
            'home' => $home
        ]);
    }
}
