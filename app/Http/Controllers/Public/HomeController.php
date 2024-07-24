<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Site\HomeProperty;

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
                // dd($value->property);
                if (isset($value->home)) {
                    $homeItem['span'] = $value->home->span;
                }


                if (isset($value->property)) {
                    $description = Str::limit($value->property->description, 300);
                    $detailsPage = '/ficha/' . $value->property->folio;
                    $data[] = [
                        'title'       => $value->property->title ?? '',
                        'price'       => number_format($value->property->price ?? 0, 2, '.', ','),
                        'area'        => $value->property->area ?? '',
                        'imageUrl'    => isset($value->property->img) ? asset('storage/' . $value->property->img) : '',
                        'content'     => $description ?? '',
                        'detailsPage' => $detailsPage
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
