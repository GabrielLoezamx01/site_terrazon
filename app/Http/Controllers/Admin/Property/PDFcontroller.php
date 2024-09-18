<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
class PDFcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $property =  Property::where('folio', $request->id)->select('folio', 'pdf')->first();
        return view('admin.properties.pdf')->with('property', $property);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
            'folio' => 'required'
        ]);

        if ($request->file('pdf')) {
            $property = Property::where('folio', $request->folio)->first();
            if ($property) {
                $fileName = time() . '_' . $request->file('pdf')->getClientOriginalName();
                $filePath = $request->file('pdf')->storeAs('uploads', $fileName, 'public');
                $property->pdf = $fileName;
                $property->save();

                return back()->with('success', 'PDF cargado correctamente.');
            }
        }

        return back()->withErrors('Error al cargar el archivo.');
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
}
