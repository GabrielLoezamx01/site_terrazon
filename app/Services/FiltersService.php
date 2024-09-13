<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Location;
use App\Models\TypeProperty;
use App\Models\ConditionProperty;
use App\Models\Amenities;

class FiltersService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties';

    protected $request;
    protected $key_list_ubicaciones;
    protected $key_list_tiposPropiedad;
    protected $key_list_conditionProperty;
    protected $key_list_amenities;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->key_list_ubicaciones       = config('app.cache.list_ubicaciones');
        $this->key_list_tiposPropiedad    = config('app.cache.list_tiposPropiedad');
        $this->key_list_conditionProperty    = config('app.cache.list_conditionProperty');
        $this->key_list_amenities    = config('app.cache.list_amenities');
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
                "value" => "5000000-6000000",
                "label" => "5 MDP a 6 MDP"
            ],
            [
                "value" => "6000000-10000000",
                "label" => "A Mas"
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
}
