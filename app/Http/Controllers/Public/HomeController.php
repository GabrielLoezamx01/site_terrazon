<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Site\HomeProperty;
use App\Http\Resources\CardResource;
class HomeController extends Controller
{
    public function index()
    {
        $properties = HomeProperty::with([
            'property' => function ($query) {
                $query->where('available', 1);
            },
            'home'
        ])->get(); 
        $groupedProperties = $properties->groupBy('home.name');
        $data = [];
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
        // json_dd($homeItem);
        return view('public.home', [ 
            'cards2' => $data,
            'home' => $home
        ]);

    }
}
