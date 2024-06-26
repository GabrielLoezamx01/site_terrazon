<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $data = [
            [
                'title' => 'Apartamentos Marinos',
                'price' => number_format(150000, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ],
            [
                'title' => 'Apartamentos Ciudad',
                'price' => number_format(100000, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ],
            [
                'title' => 'Apartamentos Chicos',
                'price' => number_format(500000, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ],
            [
                'title' => 'Apartamentos Medianos',
                'price' => number_format(700000, 2,'.',','),
                'area' => '720 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ],
            [
                'title' => 'Apartamentos Grandes',
                'price' => number_format(900000, 2,'.',','),
                'area' => '920 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ],
        ];
        return view('public.home', [
            'cards1' => $data,
            'cards2' => $data,
        ]);
    }
}
