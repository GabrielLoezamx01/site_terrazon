<?php

namespace App\Http\Controllers\Site\Home;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Site\HomeProperty;

class PropertyHome extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('available', 1)->with(['municipality.state', 'homes:id'])
            ->select('id', 'folio', 'title', 'price', 'municipality_id')
            ->get()
            ->map(function ($property) {
                $property->has_homes = $property->homes->isNotEmpty();
                $property->home_id = $property->homes->isNotEmpty() ? $property->homes->first()->id : null;
                return $property;
            });
        return $properties;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'home_id' => 'required',
                'folios' => 'required',
            ]);
            $id_home = $request->home_id;
            $folios = $request->folios;
            HomeProperty::where('home_id', $id_home)->delete();
            $ids_properties = Property::whereIn('folio', $folios)->pluck('id');
            foreach ($ids_properties as $id_property) {

                $request = [
                    'home_id' => $id_home,
                    'property_id' => $id_property,
                ];
                $details_id = HomeProperty::updateOrCreate(
                    $request,
                    $request
                );
            }
            $this->clearCache();
            return response()->json(['message' => 'Registrado con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al registrar'], 400);
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
        //
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
    private function clearCache()
    {
        if (Cache::has(config('cache.home.properties'))) {
            Cache::forget(config('cache.home.properties'));
        }
    }
}
