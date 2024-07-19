<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
class PropiedadesController extends Controller
{
    public function index($sku)
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
    public function ficha($sku){
        $property= Property::with('types','amenities','conditions','details','features','galleries')->where('folio',$sku)->first();
        $galery=[];
        if($property->galleries){
            foreach($property->galleries as $key => $value){
                $item=[
                    "id"=>$key,
                    "label"=>$value->title,
                    "imageUrl"=>isset($value->original_image) ? asset('storage/' . $value->original_image):''
                ];
                $galery[]=$item;
            }
        }
        $data = [];
        for($i=0; $i<12; $i++){
            $data[]=[
                'title' => 'Apartamentos Marinos',
                'price' => number_format(150000, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('images/card-img.png'),
                'content' => 'Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.',
                'detailsPage' => '/ficha/sku'
            ];
        }
        // $busqueda=[];
        // $favoritos=[];
        // $otros=[];
        // $nuevo=[];
        $busqueda=$data[0];
        $favoritos=$data[0];
        $otros=$data[0];
        $nuevo=$data[0];
        return view('public.ficha', [
            'sku' => $sku,
            'property' => $property,
            'galery'=> $galery,
            'cards1' => $data,
            'busqueda' => $busqueda,
            'favoritos' => $favoritos,
            'otros' => $otros,
            'nuevo' => $nuevo,
        ]);
    }
}
