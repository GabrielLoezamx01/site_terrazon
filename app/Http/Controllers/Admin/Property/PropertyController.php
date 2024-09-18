<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\TypeProperty;
use App\Models\Municipality;
use App\Models\Location;
use App\Models\DetailProperty;
use App\Models\FeaturesProperty;
use App\Models\Amenities;
use App\Models\ConditionProperty;
use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;
// use App\Models\Distribution;

use App\Models\Relationship\FeatureProperty;
use App\Models\Relationship\TypesProperty;
use App\Models\Relationship\DetailsProperty;
use App\Models\Relationship\ConditionsProperty;
use App\Models\Relationship\AmenitiesProperty;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class PropertyController extends Controller
{
    protected $key_cache_new_properties;
    public function __construct()
    {
        $this->key_cache_new_properties = config('app.cache.new_properties');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::with(['municipality.state', 'types', 'amenities', 'conditions', 'details', 'features'])->paginate(10);
        // json_dd($property);
        return view('admin.properties.list', compact('property'));
    }


    /**
     * Return view by insert item.
     *
     * @return \Illuminate\Http\Response
     */
    public function createView()
    {
        $municipality = Municipality::with('state')->get();
        $location = Location::where('status', 1)->get();

        return view('admin.properties.create')->with(compact('municipality', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function insert_property($request)
    {
        $name = $request->informacion['name'];
        $address = $request->informacion['address'];
        $slug = $this->slug_generate($name, $address);
        $property = new Property();
        $property->title = $name;
        $property->slug = $slug;
        $property->description = $request->informacion['description'];
        $property->price = $request->informacion['price'];
        $property->latitude = $request->latitude ?? 0;
        $property->longitude = $request->longitud ?? 0;
        $property->address = $address;
        $property->rooms = $request->informacion['rooms'];
        $property->bathrooms = $request->informacion['bathrooms'];
        $property->parking = $request->parkingCheck ? $request->parking : 0;
        $property->img = 'defauld.jpg';
        $property->folio = Str::upper(Str::random(8));
        $property->available = 0;
        $property->municipality_id = $request->municipality;
        $property->m2 = $request->informacion['m2'];
        $property->video = $request->informacion['video'] ?? '';
        $property->tour = htmlspecialchars($request->informacion['tour'] ?? '', ENT_QUOTES, 'UTF-8');
        $property->location_id = $request->tipo_location;
        $property->save();
        return $property->id;
    }

    private function validate_insert($model, $data)
    {
        switch ($model) {
            case 'amenities_property':
                $database = new AmenitiesProperty();
                break;
            case 'types_property':
                $database = new TypesProperty();
                break;
            case 'conditions_property':
                $database = new ConditionsProperty();
                break;
            case 'feature_property':
                $database = new FeatureProperty();
                break;
            case 'details_property':
                $database = new DetailsProperty();
                break;
        }
        if (!empty($data)) {
            foreach ($data as $item) {
                $database->updateOrCreate($item, $item);
            }
        }
    }

    private function amenities_property($amenities, $property_id)
    {
        $data = [];
        foreach ($amenities as $amenity) {
            $data[] = [
                'property_id' => $property_id,
                'amenities_id' => $amenity,
            ];
        }
        $this->validate_insert('amenities_property', $data);
    }

    private function feature_property($features, $property_id)
    {
        $data = [];
        foreach ($features as $feature) {
            $data[] = [
                'property_id' => $property_id,
                'features_property_id' => $feature,
            ];
        }
        $this->validate_insert('feature_property', $data);
    }
    private function types_property($types, $property_id)
    {
        $data = [];
        foreach ($types as $type) {
            $data[] = [
                'property_id' => $property_id,
                'types_id' => $type,
            ];
        }
        $this->validate_insert('types_property', $data);
    }

    private function conditions_property($conditions, $property_id)
    {
        $data = [];
        foreach ($conditions as $condition) {
            $data[] = [
                'property_id' => $property_id,
                'condition_id' => $condition,
            ];
        }
        $this->validate_insert('conditions_property', $data);
    }

    private function details_property($details_id, $property_id)
    {
        $data = [];
        foreach ($details_id as $id) {
            $data[] = [
                'property_id' => $property_id,
                'detail_id' => $id,
            ];
        }
        $this->validate_insert('details_property', $data);
    }

    public function insert_detail(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);

            if (empty($id)) {
                return redirect()->back()->withErrors(['error' => 'Hubo un problema al procesar la solicitud. Inténtalo de nuevo.']);
            }

            $details_id = DetailProperty::updateOrCreate(
                ['name' => $request->name],
                ['name' => $request->name]
            );

            $data = [
                'property_id' => $id,
                'detail_id' => $details_id->id,
            ];

            DetailsProperty::updateOrCreate($data, $data);

            return redirect()->back()->with('success', '¡Operación realizada con éxito!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al procesar la solicitud. Inténtalo de nuevo. ::: ' . $e->getMessage()]);
        }
    }

    private function details_validate($request_details)
    {
        $detailsProperty = [];
        foreach ($request_details as $detail) {
            $model = DetailProperty::updateOrCreate(
                [
                    'name' => $detail
                ],
                [
                    'name' => $detail
                ]
            );
            $detailsProperty[] = $model->id;
        }
        return $detailsProperty;
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'informacion' => 'required',
                'informacion.name' => 'required',
                'informacion.m2' => 'required',
                'informacion.address' => 'required',
                'informacion.description' => 'required',
                'informacion.rooms' => 'required',
                'informacion.bathrooms' => 'required',
                'informacion.price' => 'required',
                'municipality' => 'required',
                'amenities' => 'required',
                'types' => 'required',
                'conditions' => 'required',
                'feature' => 'required',
                'details' => 'required',
            ]);

            $detailsProperty = self::details_validate($request->details);

            $property_id = $this->insert_property($request);

            self::details_property($detailsProperty, $property_id);

            self::amenities_property($request->amenities, $property_id);

            self::feature_property($request->feature, $property_id);

            self::types_property($request->types, $property_id);

            self::conditions_property($request->conditions, $property_id);

            $this->cleanNewProperties();

            return response()->json(['success' => 'Propiedad creada con éxito. Continúa con el proceso de creación.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear : ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with(['municipality.state', 'types', 'amenities', 'conditions', 'details', 'features'])->where('folio', $id)->first();
        $municipality = Municipality::with('state')->get();
        $location = Location::where('status', 1)->get();
        $items = [
            'amenities' => Amenities::all(),
            'conditions' => ConditionProperty::all(),
            'types' => TypeProperty::all(),
            'feature' => FeaturesProperty::all(),
        ];
        return view('admin.properties.edit', compact('property', 'municipality', 'location', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'm2' => 'required',
            'address' => 'required',
            'description' => 'required',
            'rooms' => 'required|not_in:0',
            'bathrooms' => 'required|not_in:0',
            'price' => 'required|not_in:0',
            'municipality' => 'required',
            'amenities' => 'required',
            'types' => 'required',
            'conditions' => 'required',
            'features' => 'required',
            'conditions' => 'required',
            'parking' => 'required',
        ]);
        $name = $request->name;
        $address = $request->address;
        $slug = $this->slug_generate($name, $address);
        $property = Property::where('folio', $id)->first();
        $property_id = $property->id;
        $property->title = $name;
        $property->slug = $slug;
        $property->address = $address;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->latitude = $request->latitude ?? 0;
        $property->longitude = $request->longitude ?? 0;
        $property->address = $request->address;
        $property->rooms = $request->rooms;
        $property->bathrooms = $request->bathrooms;
        $property->parking = $request->parking;
        $property->video = $request->video;
        $property->tour = htmlspecialchars($request->tour ?? '', ENT_QUOTES, 'UTF-8');
        $property->municipality_id = $request->municipality;
        $property->location_id = $request->tipo_location;
        $property->m2 = $request->m2;
        $property->save();

        $this->delete_relationship($property_id);

        self::amenities_property($request->amenities, $property_id);

        self::feature_property($request->features, $property_id);

        self::types_property($request->types, $property_id);

        self::conditions_property($request->conditions, $property_id);

        $this->cleanNewProperties();

        return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
    }

    public function details($property)
    {
        $details = Property::where('slug', $property)->with('details')->first();
        $details = empty($details) ? ['error' => 'Error en la propiedad'] : $details;
        return view('admin.properties.details', compact('details'));
    }



    private function  delete_relationship($id)
    {
        AmenitiesProperty::where('property_id', $id)->delete();
        FeatureProperty::where('property_id', $id)->delete();
        TypesProperty::where('property_id', $id)->delete();
        ConditionsProperty::where('property_id', $id)->delete();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $property = Property::where('folio', $id)->first();

        if (!$property) {
            return [
                'message' => 'Propiedad no encontrada',
                'status' => 404
            ];
        }

        if ($property->available == 1 || $property->available == 3) {
            return [
                'message' => 'Propiedad no se puede eliminar',
                'status' => 404
            ];
        }

        $property->delete();
        $this->cleanNewProperties();

        return [
            'message' => 'Propiedad eliminada correctamente',
            'status' => 200
        ];
    }

    public function delete_details(Request $request)
    {
        $property = DetailProperty::where('id', $request->details_id)->first();
        if (!$property) {
            return response()->json(['error' => 'detalle no encontrado.'], 404);
        }
        $property->delete();
        $this->cleanNewProperties();
        DB::table('details_property_relationship')->where('detail_id', $request->details_id)->delete();
        return redirect()->back()->withSuccess('eliminado correctamente.');
    }

    /**
     * Generate a slug based on the name and address.
     *
     * @param  string  $name
     * @param  string  $address
     * @return string
     */
    private function slug_generate(string $name, string $address)
    {
        $slug = str_replace(' ', '-', $name);
        $slugLocation =  str_replace(' ', '-', $address);
        return $slug . '-' . $slugLocation;
    }
    public function deactivate_property(Request $request)
    {
        $propertyId = $request->property;
        $validate = Property::where('id', $propertyId)->whereIn('available', [0, 3])->exists();
        if ($validate > 0) {
            return response()->json(['error' => 'La propiedad ya se encuentra desactivada o vendida.'], 402);
        }
        Property::where('id', $propertyId)->update(['available' => 0]);
        $this->cleanNewProperties();
        return response()->json(['message' => 'Propiedad desactivada con éxito.'], 200);
    }
    public function active_property(Request $request)
    {
        $propertyId = $request->property;
        $validate = Property::where('id', $propertyId)->first();

        if ($validate) {
            $status = match (true) {
                $validate->available == 1 => 'La propiedad ya se encuentra activa.',
                $validate->location_id == null => 'No está asignado un tipo de locación.',
                default => null,
            };
            if ($status) {
                return response()->json(['error' => $status], 500);
            }
        }

        $amenitiesExist = AmenitiesProperty::where('property_id', $propertyId)->exists();
        if (!$amenitiesExist) {
            return response()->json(['error' => 'No hay amenidades disponibles para esta propiedad.'], 500);
        }
        // $distributionExist = Distribution::where('property_id', $propertyId)->exists();

        // if (!$distributionExist) {
        //     return response()->json(['error' => 'No hay distribucion disponibles para esta propiedad.'], 500);
        // }

        $typesExist = TypesProperty::where('property_id', $propertyId)->exists();
        if (!$typesExist) {
            return response()->json(['error' => 'No hay tipos disponibles para esta propiedad.'], 500);
        }

        $conditionsExist = ConditionsProperty::where('property_id', $propertyId)->exists();
        if (!$conditionsExist) {
            return response()->json(['error' => 'No hay condiciones disponibles para esta propiedad.'], 500);
        }

        $featuresExist = FeatureProperty::where('property_id', $propertyId)->exists();
        if (!$featuresExist) {
            return response()->json(['error' => 'No hay características disponibles para esta propiedad.'], 500);
        }

        $detailsExist = DetailsProperty::where('property_id', $propertyId)->exists();
        if (!$detailsExist) {
            return response()->json(['error' => 'No hay detalles disponibles para esta propiedad.'], 500);
        }

        $galleryExist = Gallery::where('property_id', $propertyId)->exists();
        if (!$galleryExist) {
            return response()->json(['error' => 'No hay galería disponible para esta propiedad.'], 500);
        }

        Property::where('id', $propertyId)->update(['available' => 1]);
        $this->cleanNewProperties();

        return response()->json(['message' => 'Propiedad activada con éxito.'], 200);
    }
    public function destacado(Request $request, $id)
    {
        $item = Property::findOrFail($id);
        $item->featured = $request->featured;
        $item->save();

        $message = 'La propiedad se ha removido de destacado';
        if ($request->featured == 1) {
            $message = 'La propiedad se ha marcada como destacada';
        }
        return response()->json(['message' => $message]);
    }
    public function cleanNewProperties()
    {
        Cache::forget($this->key_cache_new_properties);
    }
}
