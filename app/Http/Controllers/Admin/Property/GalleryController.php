<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Gallery;
use App\Models\Distribution;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id){
            Session::put('gallery_property_id', $request->id);
        }
        $property = Property::where('folio', Session::get('gallery_property_id'))->first();
        $gallery = Gallery::where('property_id', $property->id)->get();
        $distribution = Distribution::where('property_id', $property->id)->get();
        return view('admin.properties.gallery')->with(compact('property', 'gallery', 'distribution'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'img' => 'required|image',
        ]);
        if(empty($id)){
            return response()->json(['error' => 'Error al crear :'], 500);
        }
        $property = Property::where('folio', $id)->first();
        if($property->img != 'defauld.jpg'){
            Storage::delete('public/' . $property->img);
        }
        $fileName = $request->file('img')->getClientOriginalName();
        $fileName  = $id . '/' . $id.'-'. $fileName;
        $request->file('img')->storeAs('public/', $fileName);
        $property->img = $fileName;
        $property->save();
        return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
    }

    public function gallery_property (Request $request , $id){
        $this->validate($request, [
            'img' => 'required|array',
            'img.*' => 'image',
        ]);
        $property = Property::where('folio', $id)->first();
        $insert = [];
        foreach ($request->img as $image){
            $fileName = '';
            $fileName = $image->getClientOriginalName();
            $fileName  = $id . '/gallery/'.$fileName;
            $image->storeAs('public/', $fileName);
            $insert [] = [
                'title' => $fileName,
                'original_image' => $fileName,
                'thumbnail_image' => '',
                'property_id' => $property->id,
                'created_at' => now()
            ];
        }
        $chunks = array_chunk($insert, 30);
        foreach ($chunks as $chunk) {
            Gallery::insert($chunk);
        }
        return redirect()->back()->withSuccess('¡Operación realizada con éxito!');

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
        $gallery = Gallery::find($id);
        Storage::delete('public/' . $gallery->original_image);
        $gallery->delete();
        return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
    }
}
