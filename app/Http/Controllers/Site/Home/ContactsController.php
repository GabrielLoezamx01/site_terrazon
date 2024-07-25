<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site\Contact;
class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderByRaw('CASE WHEN status = 1 THEN 0 ELSE 1 END')
        ->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
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
                'email' => 'required',
                'coments' => 'required',
                'name' => 'required',
                'check' => 'required',
                '_token' => 'required',
            ]);
            $contact = new Contact ();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->coments;
            $contact->save();
            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
        } catch (\Exception $e) {
            session()->flash('errors', ['Error:  ' . $e->getMessage()]);
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
                'opcion' => 'required',
            ]);
            $contact = Contact::find($id);
            $contact->status = $request->opcion;
            $contact->save();
            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
        } catch (\Exception $e) {
            session()->flash('errors', ['Error:  ' . $e->getMessage()]);
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
        //
    }
}
