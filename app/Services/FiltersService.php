<?php

namespace App\Services;

use Illuminate\Http\Request;
use  App\Models\Location;
use  App\Models\TypeProperty;
use Illuminate\Support\Facades\Cache;

class FiltersService
{
    const MAX_VIEWED = 6;
    const COOKIE_NAME = 'viewed_properties';

    protected $request;
    protected $key_list_ubicaciones;
    protected $key_list_tiposPropiedad;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->key_list_ubicaciones       = config('app.cache.list_ubicaciones');
        $this->key_list_tiposPropiedad    = config('app.cache.list_tiposPropiedad');
    }
    public function resetListUbicaciones()
    {
        Cache::forget($this->key_list_ubicaciones);
    }
    public function getListBudget()
    {
        return  [
            [
                "value" => "800-1000",
                "label" => "800 mil a 1 MDP"
            ],
            [
                "value" => "1000-1999",
                "label" => "1 MDP y entre 1.7"
            ],
            [
                "value" => "2000-2999",
                "label" => "2 MDP 2.5"
            ],
            [
                "value" => "3000-3999",
                "label" => "3 MDP 3.5"
            ],
            [
                "value" => "4000-4999",
                "label" => "4 MDP 4.5"
            ],
            [
                "value" => "5000-5999",
                "label" => "5 MDP"
            ],
            [
                "value" => "6000-6999",
                "label" => "6 MDP"
            ],
            [
                "value" => "7000-9999",
                "label" => "A más"
            ],
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
}
