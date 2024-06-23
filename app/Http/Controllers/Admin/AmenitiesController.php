<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities =  Amenities::paginate(25);
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
                'svg' => 'required|file',
            ]);
            $fileName = $request->file('svg')->getClientOriginalName();
            $fileName  =  $request->name  . '-' . $fileName;
            $request->file('svg')->storeAs('public/svg', $fileName);
            $insert = [
                'name' => $request->name,
                'icon' => $fileName,
                'created_at' => now(),
            ];
            Amenities::insert($insert);
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
            $update = [
                'name' => $request->name,
                'created_at' => now(),
            ];

            if ($request->hasFile('svg')) {
                $fileName = $request->file('svg')->getClientOriginalName();
                $fileName  =  $request->name  . '-' . $fileName;
                $request->file('svg')->storeAs('public/svg', $fileName);
                $update['icon'] = $fileName;
                $icon = Amenities::where('id', $id)->select('icon')->first();
                if(!$icon->icon == null){
                    unlink(storage_path('app/public/svg/' . $icon->icon));
                }
            }
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
            $amenity = Amenities::find($id);
            if ($amenity) {
                $icon = $amenity->icon;
                if (!empty($icon)) {
                    unlink(storage_path('app/public/svg/' . $icon));
                }
                $amenity->delete();
                return response()->json(['message' => 'Operación exitosa'], 200);
            } else {
                return response()->json(['message' => 'No se encontró la amenidad'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar: ' . $e->getMessage()], 500);
        }
    }
}
