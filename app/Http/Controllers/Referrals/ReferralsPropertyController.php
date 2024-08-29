<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;
class ReferralsPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Referrals::orderBy('created_at', 'asc')->paginate(15);
        return view('admin.referrals.index')->with(compact('users'));
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
            if(isset($request->id)){
                $id = $request->id;
                $user = Referrals::find($id);
                $user->status = isset($request->active) && $request->active == true ? 'active' : 'blocked';
                $user->save();
            }
            return redirect()->route('list_users.index');
        }
        catch(\Exception $e){
            return $e->getMessage();
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
}
