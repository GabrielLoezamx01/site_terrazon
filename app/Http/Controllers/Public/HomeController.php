<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\HomeProperty;

class HomeController extends Controller
{
    public function index()
    {
        // Puedees traer las demas tablas relacionadas por ejemplo: amenities, features, types, condition.
        // $properties = HomeProperty::with(['property', 'home'])->get(); // Trae todas las propiedades
        // $properties = HomeProperty::with(['property.amenities', 'home'])->get(); // Trae todas las propiedades con sus amenities
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
                    $data[] = [
                        'title' => $value->property->title ?? '',
                        'price' => number_format($value->property->price ?? 0, 2, '.', ','),
                        'area' => $value->property->area ?? '',
                        'imageUrl' => isset($value->property->img) ? asset('storage/' . $value->property->img) : '',
                        'content' => $value->property->description ?? ''
                    ];
                }
            }

            $homeItem['data'] = $data;
            $home[] = $homeItem;
        }
        // $data = [
        //     [
        //         'title' => 'Apartamentos Marinos',
        //         'price' => number_format(150000, 2,'.',','),
        //         'area' => '520 m2',
        //         'imageUrl' => asset('images/card-img.png'),
        //         'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
        //     ],
        //     [
        //         'title' => 'Apartamentos Ciudad',
        //         'price' => number_format(100000, 2,'.',','),
        //         'area' => '520 m2',
        //         'imageUrl' => asset('images/card-img.png'),
        //         'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
        //     ],
        //     [
        //         'title' => 'Apartamentos Chicos',
        //         'price' => number_format(500000, 2,'.',','),
        //         'area' => '520 m2',
        //         'imageUrl' => asset('images/card-img.png'),
        //         'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
        //     ],
        //     [
        //         'title' => 'Apartamentos Medianos',
        //         'price' => number_format(700000, 2,'.',','),
        //         'area' => '720 m2',
        //         'imageUrl' => asset('images/card-img.png'),
        //         'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
        //     ],
        //     [
        //         'title' => 'Apartamentos Grandes',
        //         'price' => number_format(900000, 2,'.',','),
        //         'area' => '920 m2',
        //         'imageUrl' => asset('images/card-img.png'),
        //         'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
        //     ],
        // ];
        return view('public.home', [
            'cards1' => $data,
            'cards2' => $data,
            'home' => $home
        ]);

    }
}
