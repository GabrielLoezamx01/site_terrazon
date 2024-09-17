<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\Site\HomeProperty;
use App\Http\Resources\CardResource;
use App\Models\Property;
use App\Services\RecentPropertiesService;
use App\Services\FiltersService;

class HomeController extends Controller
{
    protected $key_cache_home_properties;
    protected $key_cache_viewed_properties;
    protected $key_cache_recomended_properties;
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
        $this->key_cache_recomended_properties = config('app.cache.recomended_properties');
    }
    private function getPropertiesList()
    {
        return Cache::rememberForever($this->key_cache_home_properties, function () {
            $homeProperties = HomeProperty::with([
                'property' => function ($query) {
                    $query->where('available', 1)
                        ->with('types');
                },
                'home'
            ])->get();
            return  $homeProperties->groupBy('home.name');
        });
    }
    private function getRecomendations()
    {
        return Cache::rememberForever($this->key_cache_recomended_properties, function () {
            $properties = Property::with(["location", "galleries", "features", "types"])->where('available', 1)->where('featured', 1)->get();
            return $properties;
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
        $viewed = $this->recentPropertiesService->getViewedData();
        // json_dd($viewed);
        $recomendationsArray = $this->getRecomendations();
        $recomendations = null;
        if (count($recomendationsArray) > 0) {
            $recomendations = $recomendationsArray->random();
            $recomendations = $recomendations->toArray();
            $recomendations["detailsPage"] = '/ficha/' . $recomendations["folio"];
            if (count($recomendations["features"]) > 0) {
                $recomendations["features"] = array_slice($recomendations["features"], 0, 3);
            }
            if (count($recomendations["galleries"]) > 0) {
                $gallery = [];
                foreach ($recomendations["galleries"] as $key => $value) {
                    $image = isset($value["original_image"]) ? asset('storage/' . $value["original_image"]) : '';
                    $recomendations["galleries"][$key]["imageUrl"] = urldecode($image);
                }
            }
        }
        // json_dd($recomendations);
        return view('public.home', [
            'range' => $range,
            'recomendations' => $recomendations,
            'ubicaciones' => $ubicaciones,
            'typesProperties' => $typesProperties,
            'viewed' => $viewed,
            'home' => $home
        ]);
    }
}
