<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Property;
use App\Services\RecentPropertiesService;
use Illuminate\Http\Request;
use App\Services\FiltersService;

class PropiedadesController extends Controller
{
    protected $recentPropertiesService;
    protected $filtersService;
    public function __construct(
        RecentPropertiesService $recentPropertiesService,
        FiltersService $filtersService
    ) {
        $this->recentPropertiesService = $recentPropertiesService;
        $this->filtersService = $filtersService;
    }
    public function index(Request $request)
    {

        $locationQP = $request->input('location');
        $typeQP = $request->input('type');
        $bugetQP = $request->input('budget');

        $page = ($request->input('page')) ? $request->input('page') : null;
        $perPage = ($request->input('perPage')) ? $request->input('perPage') : 6;

        $searchmode = false;
        if ($locationQP || $typeQP || $bugetQP) {
            $searchmode = true;
        }

        $range = $this->filtersService->getListBudget();
        $ubicaciones = $this->filtersService->getListUbicaciones();
        $typesProperties = $this->filtersService->getListTiposPropiedad();

        $locationObj = $ubicaciones->firstWhere('id', $locationQP);


        $data = [];
        $properties = Property::with('types', 'location', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('available', 1);

        if ($locationQP != '') {
            $properties->where('location_id', $locationQP);
        }
        if ($typeQP != '') {
            $properties->whereHas('types', function ($query) use ($typeQP) {
                $query->where('types_id', $typeQP);
            });
        }
        if ($bugetQP != '') {
            $bg=explode("-", $bugetQP);
            $budg1=isset($bg[0])?$bg[0]*1000:0;
            $budg2=isset($bg[1])?$bg[1]*1000:0;
            $properties->whereBetween('price', [$budg1, $budg2]);
        }
        $result = $properties->paginate($perPage, ['*'], 'page', $page)->appends([
            'location' => $locationQP,
            'type' => $typeQP,
            'budget' => $bugetQP,
            'perPage' => $perPage,
        ]);

        // $result = $properties->get();
        // json_dd($result);
        foreach ($result->items() as $kp => $vp) {
            $data[] = new CardResource($vp);
        }

        $paginationInfo = [
            'current_page' => $result->currentPage(),
            'last_page' => $result->lastPage(),
            'total_items' => $result->total(),
            'per_page' => $result->perPage(),
        ];

        // json_dd($paginationInfo);
        if (!empty($data)) {
            shuffle($data);
        }
        return view('public.propiedades', [
            "paginationInfo" => $result,
            'searchmode' => $searchmode,
            'location' => $locationObj,
            'locationQP' => $locationQP,
            'range' => $range,
            'ubicaciones' => $ubicaciones,
            'typesProperties' => $typesProperties,
            'cards1' => $data,
            'cards2' => $data,
        ]);
    }
    public function ficha($sku)
    {
        $properties = Property::with('types', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('available', 1)->get();
        $property   = Property::with('types', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('folio', $sku)->first();
        // json_dd($property);
        $galery = [];
        if (isset($property->galleries)) {
            foreach ($property->galleries as $key => $value) {
                $item = [
                    "id" => $key,
                    "label" => $value->title,
                    "imageUrl" => isset($value->original_image) ? asset('storage/' . $value->original_image) : ''
                ];
                $galery[] = $item;
            }
        }
        $data = [];
        // for($i=0; $i<12; $i++){
        foreach ($properties as $kp => $vp) {
            $data[] = new CardResource($vp);
        }
        shuffle($data);
        // $busqueda=[];
        // $favoritos=[];
        // $otros=[];
        // $nuevo=[];
        $busqueda = $data[0];
        $favoritos = $data[0];
        $otros = $data[0];
        $nuevo = $data[0];
        $this->addRecentViewPropertie($property);
        return view('public.ficha', [
            'sku' => $sku,
            'property' => $property,
            'galery' => $galery,
            'cards1' => $data,
            'busqueda' => $busqueda,
            'favoritos' => $favoritos,
            'otros' => $otros,
            'nuevo' => $nuevo,
        ]);
    }
    private function addRecentViewPropertie($property)
    {
        $this->recentPropertiesService->addProperty($property->id, $property->title, $property->slug);
    }
}
