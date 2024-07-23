<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Home;
use App\Models\Site\HomeProperty;

class HomePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
        return view('admin.home.index')->with(compact('home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $this->validate($request, [
                'name' => 'required',
                'span' => 'required',
            ]);

            $currentCount = Home::count();

            if ($currentCount >= 6) {
                return response()->json(['message' => 'Límite de 6 elementos alcanzado'], 400);
            }

            $home = new Home();
            $home->name = $request->name;
            $home->span = $request->span;
            $home->save();

            return response()->json(['message' => 'Registrado con éxito'], 200);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
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
        return Home::find($id);
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
            if (empty($id)) {
                return response()->json(['message' => 'Registro no encontrado'], 404);
            }
            $this->validate($request, [
                'name' => 'required',
                'span' => 'required',
            ]);
            $home = Home::find($id);
            $home->name = $request->name;
            $home->span = $request->span;
            $home->save();
            return response()->json(['message' => 'Registro actualizado con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
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
            $home = Home::find($id);
            if ($home) {
                HomeProperty::where('home_id', $id)->delete();
                $home->delete();
                return response()->json([
                    'message' => 'Registro eliminado exitosamente'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Registro no encontrado'
                ], 404);
            }
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
