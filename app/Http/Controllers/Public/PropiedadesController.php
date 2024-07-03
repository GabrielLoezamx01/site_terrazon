<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropiedadesController extends Controller
{
    public function index()
    {
        $data = [];
        for($i=0; $i<12; $i++){
            $data[]=[
                'title' => 'Apartamentos Marinos',
                'price' => number_format(150000, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.'
            ];
        }
        
        
        return view('public.propiedades', [
            'cards1' => $data,
            'cards2' => $data,
        ]);
    }
}
