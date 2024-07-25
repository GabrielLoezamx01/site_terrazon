<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distribution;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'img' => 'required|array',
                'id' => 'required'
            ]);

            if (empty($request->id)) {
                throw new \Exception('Error al crear: ID no proporcionado.');
            }

            $folio = $request->id;
            $propertyId = Property::where('folio', $folio)->value('id');

            if (!$propertyId) {
                throw new \Exception('No se encontró ninguna propiedad con el folio proporcionado.');
            }

            $insert = [];

            foreach ($request->img as $image) {
                $fileName = $image->getClientOriginalName();
                $fileName  = 'distribution/' . $folio . '/' . $fileName;

                try {
                    $image->storeAs('public', $fileName);
                } catch (\Exception $e) {
                    throw new \Exception('Error al almacenar la imagen: ' . $e->getMessage());
                }

                $insert[] = [
                    'name' => '',
                    'url' => $fileName,
                    'property_id' => $propertyId,
                    'created_at' => now()
                ];
            }

            $chunks = array_chunk($insert, 30);

            foreach ($chunks as $chunk) {
                try {
                    Distribution::insert($chunk);
                } catch (\Exception $e) {
                    throw new \Exception('Error al insertar distribución: ' . $e->getMessage());
                }
            }

            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
        $distribution = Distribution::find($id);
        Storage::delete('public/' . $distribution->url);
        $distribution->delete();
        return redirect()->back()->withSuccess('¡Elimando con éxito!');
    }
}
