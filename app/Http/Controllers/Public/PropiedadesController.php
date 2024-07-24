<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PropiedadesController extends Controller
{
    public function index()
    {
        $properties= Property::with('types','amenities','conditions','details','features','galleries')->where('available',1)->get();
        foreach($properties as $kp => $vp){
            $description = Str::limit($vp->description, 150);
            $detailsPage = '/ficha/'.$vp->folio;
            $data[]=[
                'title' => $vp->title,
                'price' => number_format($vp->price, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('storage/'.$vp->img),
                'content' => $description,
                'detailsPage' => $detailsPage
            ];
        }
        shuffle($data);
        return view('public.propiedades', [
            'cards1' => $data,
            'cards2' => $data,
        ]);
    }
    public function ficha($sku){
        $properties= Property::with('types','amenities','conditions','details','features','galleries')->where('available',1)->get();
        $property= Property::with('types','amenities','conditions','details','features','galleries')->where('folio',$sku)->first();
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
            $description = Str::limit($vp->description, 150);
            $detailsPage = '/ficha/'.$vp->folio;
            $data[]=[
                'title' => $vp->title,
                'price' => number_format($vp->price, 2,'.',','),
                'area' => '520 m2',
                'imageUrl' => asset('storage/'.$vp->img),
                'content' => $description,
                'detailsPage' => $detailsPage
            ];
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
