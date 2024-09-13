<?php

namespace App\Http\Controllers\Public;

use Carbon\Carbon;
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

        $allTypesQP = $request->input('allTypes');
        $locationQP = $request->input('location');
        $bugetQP = $request->input('budget');
        $parkingQP = $request->input('parking');
        $bathroomsQP = $request->input('bathrooms');
        $roomsQP = $request->input('rooms');
        $typeQP =  $request->input('type') != null ? $request->input('type')  : [];
        $conditionsQp = $request->input('condition') != null ? $request->input('condition')  : [];
        $amenitiesQp = $request->input('amenities') != null ? $request->input('amenities')  : [];
        $filterOpen = ($request->input('filter')) ? $request->input('filter') : null;
        $page = ($request->input('page')) ? $request->input('page') : null;
        $perPage = ($request->input('perPage')) ? $request->input('perPage') : 6;

        $searchmode = false;


        $range = $this->filtersService->getListBudget();
        $ubicaciones = $this->filtersService->getListUbicaciones();
        $typesProperties = $this->filtersService->getListTiposPropiedad();
        $conditionsProperty = $this->filtersService->getConditionsProperty();
        $amenities = $this->filtersService->getAmenities();

        $locationObj = $ubicaciones->firstWhere('id', $locationQP);


        $data = [];
        $properties = Property::with('types', 'location', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('available', 1);

        if ($locationQP || $typeQP || $bugetQP) {
            $searchmode = true;
        }

        if ($locationQP != '') {
            $properties->where('location_id', $locationQP);
        }
        if ($parkingQP != '') {
            $properties->where('parking', $parkingQP);
        }
        if ($bathroomsQP != '') {
            $properties->where('bathrooms', $bathroomsQP);
        }
        if ($roomsQP != '') {
            $properties->where('rooms', $roomsQP);
        }
        if (count($conditionsQp) > 0) {
            $properties->whereHas('conditions', function ($query) use ($conditionsQp) {
                $query->whereIn('condition_id', $conditionsQp);
            });
        }
        if (count($typeQP) > 0) {
            $properties->whereHas('types', function ($query) use ($typeQP) {
                $query->whereIn('types_id', $typeQP);
            });
        }
        if (count($amenitiesQp) > 0) {
            $properties->whereHas('amenities', function ($query) use ($amenitiesQp) {
                $query->whereIn('amenities_id', $amenitiesQp);
            });
        }

        $budg1 = 0;
        $budg2 = 10000000;
        if ($bugetQP != '') {
            $bg = explode("-", $bugetQP);
            $budg1 = isset($bg[0]) ? $bg[0] : 0;
            $budg2 = isset($bg[1]) ? $bg[1] : 0;
            $properties->whereBetween('price', [$budg1, $budg2]);
        } else {
            $bugetQP = "0-10000000";
        }
        $result = $properties->paginate($perPage, ['*'], 'page', $page)->appends([
            'location' => $locationQP,
            'type' => $typeQP,
            'perPage' => $perPage,
        ]);

        foreach ($result->items() as $kp => $vp) {
            $data[] = new CardResource($vp);
        }
        if (!empty($data)) {
            shuffle($data);
        }

        $viewed = $this->recentPropertiesService->getRecentlyViewed();
        return view('public.propiedades', [
            'budg1'              => $budg1,
            'budg2'              => $budg2,
            'budget'             => $bugetQP,
            'range'              => $range,
            "filter"             => $filterOpen,
            'searchmode'         => $searchmode,
            "allTypesQP"         => $allTypesQP,
            "parkingQP"          => $parkingQP,
            "bathroomsQP"        => $bathroomsQP,
            "roomsQP"            => $roomsQP,
            "typeQP"             => $typeQP,
            "conditionsQp"       => $conditionsQp,
            'location'           => $locationObj,
            'locationQP'         => $locationQP,
            'amenitiesQp'        => $amenitiesQp,
            'ubicaciones'        => $ubicaciones,
            'typesProperties'    => $typesProperties,
            'conditionsProperty' => $conditionsProperty,
            'amenities'          => $amenities,
            'results'            => $data,
            'viewed'             => $viewed,
            "paginationInfo"     => $result,
        ]);
    }
    public function ficha($sku)
    {
        Carbon::setLocale('es');
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

        $property->fechaCreacion = ucfirst($this->getDateFormat($property->created_at));
        $property->fechaActualizacion = ucfirst($this->getDateFormat($property->updated_at));
        $property->increment('view_count');
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
    function getDateFormat($fecha)
    {
        $fechaCreacion_ = Carbon::parse($fecha);
        return $fechaCreacion_->translatedFormat('F Y');
    }
    private function addRecentViewPropertie($property)
    {
        $this->recentPropertiesService->addProperty($property->id, $property->title, $property->slug);
    }
}
