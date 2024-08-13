<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
use App\Models\Relationship\AmenitiesProperty;
use Illuminate\Support\Facades\Storage;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities =  Amenities::paginate(15);
        return view('admin.properties.amenities', compact('amenities'));
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
                'name' => 'required',
                // 'svg' => 'required|file',
            ]);
            // $fileName = $request->file('svg')->getClientOriginalName();
            // $fileName  =  $request->name  . '-' . $fileName;
            // $request->file('svg')->storeAs('public/svg', $fileName);

            $amenities = new Amenities();
            $amenities->name = $request->name;
            $amenities->icon = '';
            $amenities->save();

            // $insert = [
            //     'name' => $request->name,
            //     'icon' => '',
            //     'created_at' => now(),
            // ];

            // Amenities::insert($insert);

            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');

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
        return Amenities::find($id);
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
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $update = [
                'name' => $request->name,
                'updated_at' => now(),
            ];
            // if ($request->hasFile('svg')) {
            //     $fileName = $request->file('svg')->getClientOriginalName();
            //     $fileName  =  $request->name  . '-' . $fileName;
            //     $request->file('svg')->storeAs('public/svg', $fileName);
            //     $update['icon'] = $fileName;
            //     $icon = Amenities::where('id', $id)->select('icon')->first();
            //     if(!$icon->icon == null){
            //         \Storage::delete('public/svg/' .$icon->icon);
            //     }
            // }
            Amenities::where('id', $id)->update($update);
            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $validacion = AmenitiesProperty::where('amenities_id',$id)->exists();
            if($validacion){
                session()->flash('errors', 'Hay propiedades asignadas a esta amenidad');
            }else{
                $amenity = Amenities::findOrFail($id);
                if (!empty($amenity->icon)) {
                    \Storage::delete('public/svg/' . $amenity->icon);
                }
                $amenity->delete();
                session()->put('success', 'Operación exitosa');
            }
        } catch (\Exception $e) {
            session()->flash('errors', $e->getMessage());
        }
    }
}
