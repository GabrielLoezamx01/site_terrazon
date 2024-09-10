<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Property;
class PropiedadesController extends Controller
{
    public function index()
    {
        $data=[];
        $properties= Property::with('types','amenities','conditions','details','features','galleries')->where('available',1)->get();
        foreach($properties as $kp => $vp){
            $data[]=new CardResource($vp);
        }
        if(!empty($data)){
            shuffle($data);
        }
        return view('public.propiedades', [
            'cards1' => $data,
            'cards2' => $data,
        ]);
    }
    public function ficha($sku){
        $properties = Property::with('types','amenities','conditions','details','features','galleries')->where('available',1)->get();
        $property   = Property::with('types','amenities','conditions','details','features','galleries')->where('folio',$sku)->first();
        // json_dd($property);
        $galery=[];
        if(isset($property->galleries)){
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
        // for($i=0; $i<12; $i++){
        foreach($properties as $kp => $vp){ 
            $data[] = new CardResource($vp);
        }
        shuffle($data);
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
