<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Flat;
use App\Detail;
use App\Address;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        $log = Auth::user()->id;
        if ($id != Auth::user()->id ) {
          return redirect("profile/$log");
        }
        $user = User::findOrFail($id);
        $userFlat = Flat::where('user_id', Auth::user()->id)->get();


        $arrDetail = [];
        $arrAddress = [];


        foreach ($userFlat as $flat) {
            $detailFlat = Detail::where('flat_id', $flat->id)->get();
            array_push($arrDetail, $detailFlat);
        }

        foreach ($userFlat as $address) {
            $addressFlat = Address::where('flat_id', $address->id)->get();
            array_push($arrAddress, $addressFlat);
        }


        // dd($arrDetail);

        return view('profile')->with('user', $user)
                              ->with('arrDetail', $arrDetail)
                              ->with('arrAddress', $arrAddress)
                              ->with('userFlat', $userFlat);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
