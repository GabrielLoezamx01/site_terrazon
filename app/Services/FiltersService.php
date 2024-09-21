<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Location;
use App\Models\TypeProperty;
use App\Models\ConditionProperty;
use App\Models\Amenities;
use App\Models\Favorite;

class FiltersService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties';

    protected $request;
    protected $key_list_ubicaciones;
    protected $key_list_tiposPropiedad;
    protected $key_list_conditionProperty;
    protected $key_list_amenities;
    protected $key_favorites;
    protected $key_favorites_all;
    public function __construct($user_id = null)
    {
        $this->key_list_ubicaciones       = config('app.cache.list_ubicaciones');
        $this->key_list_tiposPropiedad    = config('app.cache.list_tiposPropiedad');
        $this->key_list_conditionProperty    = config('app.cache.list_conditionProperty');
        $this->key_list_amenities    = config('app.cache.list_amenities');
        $this->key_favorites    = config('app.cache.favorites');
        $this->key_favorites_all   = config('app.cache.favorites_all');
    }
    public function resetListUbicaciones()
    {
        Cache::forget($this->key_list_ubicaciones);
    }
    public function getListBudget()
    {
        return  [
            [
                "value" => "0-1000000",
                "label" => "Menos de 1 MDP"
            ],
            [
                "value" => "1000000-2000000",
                "label" => "1 MDP a 2 MDP"
            ],
            [
                "value" => "2000000-3000000",
                "label" => "2 MDP a 3 MDP"
            ],
            [
                "value" => "3000000-4000000",
                "label" => "3 MDP a 4 MDP"
            ],
            [
                "value" => "4000000-5000000",
                "label" => "4 MDP a 5 MDP"
            ],
            [
                "value" => "5000000-6000000",
                "label" => "5 MDP a 6 MDP"
            ],
            [
                "value" => "6000000-10000000",
                "label" => "A más de 6 MDP"
            ]
        ];
    }
    public function getListUbicaciones()
    {
        return Cache::rememberForever($this->key_list_ubicaciones, function () {
            $locations = Location::get();
            return  $locations;
        });
    }
    public function resetListTiposPropiedad()
    {
        Cache::forget($this->key_list_ubicaciones);
    }
    public function getListTiposPropiedad()
    {
        return Cache::rememberForever($this->key_list_tiposPropiedad, function () {
            $TypeProperty = TypeProperty::get();
            return  $TypeProperty;
        });
    }
    public function getConditionsProperty()
    {
        return Cache::rememberForever($this->key_list_conditionProperty, function () {
            $ConditionProperty = ConditionProperty::get();
            return  $ConditionProperty;
        });
    }
    public function getAmenities()
    {
        return Cache::rememberForever($this->key_list_amenities, function () {
            $Amenities = Amenities::get();
            return  $Amenities;
        });
    }
    public function getFavorites($user_id)
    { 
        if (!$user_id && $user_id == null) {
            return [];
        }
        return Cache::rememberForever($this->key_favorites . $user_id, function () use ($user_id) {
            $favorites = Favorite::select("property_id")->where('custom_user_id', $user_id)
                ->pluck('property_id')
                ->toArray();
            return  $favorites;
        });
    }
    public function cleanFavorites($user_id)
    {
        $this->forget($this->key_favorites .  $user_id);
        $this->forget($this->key_favorites_all .  $user_id);
    }
    public function cleanUbicaciones()
    {
        $this->forget($this->key_list_ubicaciones);
    }
    public function cleanTiposPropiedad()
    {
        $this->forget($this->key_list_tiposPropiedad);
    }
    public function cleanConditionsProperty()
    {
        $this->forget($this->key_list_conditionProperty);
    }
    public function cleanAmenities()
    {
        $this->forget($this->key_list_amenities);
    }
    public function forget($key)
    {
        Cache::forget($key);
    }
}
