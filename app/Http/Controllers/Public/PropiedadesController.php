<?php

namespace App\Http\Controllers\Public;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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
    private $key_cache_new_properties;
    public function __construct(
        RecentPropertiesService $recentPropertiesService,
        FiltersService $filtersService
    ) {
        $this->key_cache_new_properties = config('app.cache.new_properties');
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
        $property   = Property::with('types', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('folio', $sku)->first();
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


        // shuffle($data);
        $busqueda = [];
        $favoritos = [];
        $otros = [];
        $nuevo = [];

        $property->fechaCreacion = ucfirst($this->getDateFormat($property->created_at));
        $property->fechaActualizacion = ucfirst($this->getDateFormat($property->updated_at));
        $property->increment('view_count');
        $this->addRecentViewPropertie($property);

        $location_id = $property->location_id;
        $recomendations = $this->getRecomendations($location_id);
        $nuevo = $this->getNeuevo();
        return view('public.ficha', [
            'sku' => $sku,
            'property' => $property,
            'galery' => $galery,
            'recomendations' => $recomendations,
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
    private function getRecomendations($location_id)
    {
        $data = [
            "title" => "",
            "description" => "",
            "data" => []
        ];
        $properties = Property::with('types', 'amenities', 'conditions', 'details', 'features', 'galleries', 'location')->where('available', 1)->where('featured', 1)->where('location_id', $location_id)->get();
        foreach ($properties as $kp => $vp) {
            $data["title"] = $vp->location->featured_title;
            $data["description"] = $vp->location->featured_msg;
            $data["data"][] = new CardResource($vp);
        }
        return $data;
    }
    private function getNeuevo()
    {

        return Cache::rememberForever($this->key_cache_new_properties, function () {
            $prop = Property::with('types', 'amenities', 'conditions', 'details', 'features', 'galleries', 'location')
                ->where('available', 1)
                ->orderBy('created_at', 'desc')
                ->first();
            return new CardResource($prop);
        });
    }
}
