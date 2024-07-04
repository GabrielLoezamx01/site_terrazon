<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Municipality;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::with(['municipality.state', 'types', 'amenities', 'conditions', 'details', 'features'])->paginate(10);
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
        return view('admin.properties.create')->with(compact('municipality'));
    }
    public function continueView()
    {
        $property = Property::with(['municipality.state', 'types', 'amenities', 'conditions', 'details', 'features'])->where('id', 1)->get();

        // $property = Property::where('id', 1)->get();
        return $property;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function insert_modelo($request)
    {
        $slug = $this->slug_generate($request->name, $request->address);
        $property = new Property();
        $property->title = $request->name;
        $property->slug = $slug;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->latitude = $request->latitude ?? 0;
        $property->longitude = $request->longitud ?? 0;
        $property->address = $request->address;
        $property->rooms = $request->rooms;
        $property->bathrooms = $request->bathrooms;
        $property->parking = $request->bathrooms;
        $property->img = 'defauld.jpg';
        $property->folio = Str::upper(Str::random(8));
        $property->available = 0;
        $property->municipality_id = $request->municipality;
        $property->save();
        session(['property_id' => $property->id]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'informacion' => 'required',
                'informacion.name' => 'required',
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
            return $request->all();
            $this->insert_modelo($request);
            return response()->json(['success' => 'Propiedad creada con éxito. Continúa con el proceso de creación.'], 200);
            return $request->all();
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
        return Property::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
