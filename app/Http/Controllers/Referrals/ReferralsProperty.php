<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;

class ReferralsProperty extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Referrals::with('properties')->paginate(25);
        return view('admin.referrals.property')->with(compact('collection'));
        // $property = Property::find(1);
        // $referral = Referral::find(1);

        // $property->referrals()->attach($referral->id);
        // // o
        // $referral->properties()->attach($property->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
