<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturesProperty;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features =  FeaturesProperty::paginate(25);
        return view('admin.properties.features', compact('features'));
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
                'svg' => 'required|file',
            ]);
            $fileName = $request->file('svg')->getClientOriginalName();
            $fileName =  'feature-' .$request->name  . '-' . $fileName;
            $request->file('svg')->storeAs('public/svg', $fileName);
            $insert = [
                'name' => $request->name,
                'icon' => $fileName,
                'created_at' => now(),
            ];
            FeaturesProperty::insert($insert);
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
        return FeaturesProperty::find($id);
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
            if ($request->hasFile('svg')) {
                $fileName = $request->file('svg')->getClientOriginalName();
                $fileName =  'feature-' . $request->name  . '-' . $fileName;
                $request->file('svg')->storeAs('public/svg', $fileName);
                $update['icon'] = $fileName;
                $icon = FeaturesProperty::where('id', $id)->select('icon')->first();
                if (!$icon->icon == null) {
                    \Storage::delete('public/svg/' . $icon->icon);
                }
            }
            FeaturesProperty::where('id', $id)->update($update);
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
            $feature = FeaturesProperty::findOrFail($id);
            if (!empty($feature->icon)) {
                \Storage::delete('public/svg/' . $feature->icon);
            }
            $feature->delete();
            session()->flash('success', 'Operación exitosa');
        } catch (\Exception $e) {
            session()->flash('errors', ['Error al eliminar ' . $e->getMessage()]);
        }
    }
}
