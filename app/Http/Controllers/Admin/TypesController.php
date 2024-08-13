<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypesProperty;
use App\Models\Relationship\TypesProperty as TypesPropertyRelationship;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypesProperty::paginate(15);
        return view('admin.properties.types')->with(compact('types'));
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
            ]);
            $insert = [
                'name' => $request->name,
                'created_at' => now(),
            ];
            TypesProperty::insert($insert);
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
        return TypesProperty::find($id);
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
                'updated_at' => now(),
            ];
            TypesProperty::where('id', $id)->update($update);
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
            $validacion = TypesPropertyRelationship::where('types_id', $id)->exists();
            if ($validacion) {
                session()->flash('errors', 'Hay propiedades asignadas a este tipo de propiedad');
            } else {
                $types = TypesProperty::findOrFail($id);
                $types->delete();
                session()->flash('success', 'Operación exitosa');
            }
        } catch (\Exception $e) {
            session()->flash('errors', ['Error al eliminar ' . $e->getMessage()]);
        }
    }
}
