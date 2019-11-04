<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;
use App\Address;
use App\Service;
use App\Detail;
use App\User;



class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $flats = Flat::all();
      $addresses = Address::all();

      return view('allFlatsPage')
                  -> with('flats',$flats)
                  -> with('addresses',$addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function addFlat()
     {
         $services = Service::all();
         return view('addFlat', compact('services'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFlat(Request $request)
    {
      $dataTableFlats = $request -> validate([
        'views' => 'nullable',
        'rate'=> 'nullable',
        'user_id'=> 'nullable',
      ]);

      $flat = Flat::create($dataTableFlats);
      // prendo l id del flat appena creato
      $flat_id = $flat -> id;


      $dataTableDetails = $request -> validate([
        'title' => 'nullable',
        'num_room'=> 'nullable',
        'bed'=> 'nullable',
        'bathroom'=> 'nullable',
        'mq'=> 'nullable',
        'img'=> 'nullable',
        'flat_id' => 'nullable',

      ]);

      // creo un nuovo detail e associo ad ogni campo
      //il valore della request che ha i dati del form
      $detail = new Detail;
      $detail ->title = $request ->title;
      $detail ->num_room = $request ->num_room;
      $detail ->bed = $request ->bed;
      $detail ->bathroom = $request ->bathroom;
      $detail ->mq = $request ->mq;
      $detail ->img = $request ->img;
      $detail ->flat_id = $flat_id;

      // dd($detail);
      $detail ->save();


      $dataTableAddresses = $request -> validate([
        'state' => 'nullable',
        'city'=> 'nullable',
        'road'=> 'nullable',
        'cap'=> 'nullable',
        'num_civ'=> 'nullable',
        'flat_id'=> 'nullable',
        'lat'=> 'nullable',
        'lon'=> 'nullable',

      ]);

      // creo un nuovo detail e associo ad ogni campo
      //il valore della request che ha i dati del form
      $address = new Address;
      $address ->state = $request ->state;
      $address ->city = $request ->city;
      $address ->road = $request ->road;
      $address ->cap = $request ->cap;
      $address ->civ_num = $request ->civ_num;
      $address ->flat_id = $flat_id;
      $address ->lat = $request ->lat;
      $address ->lon = $request ->lon;

      // dd($detail);
      $address ->save();


      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFlat($id)
    {
        $singleFlat = Flat::findOrFail($id);

        $detailFlat = Detail::where('flat_id', $id)->get();

        $addressFlat = Address::where('flat_id', $id)->get();



        return view('singleFlat')->with('singleFlat', $singleFlat)
                                  ->with('detailFlat', $detailFlat)
                                  ->with('addressFlat', $addressFlat);

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
    public function deleteFlat($id)
    {
        $flat = Flat::findOrFail($id);

        $flat->detail->delete();
        $flat->address->delete();
        $flat->delete();

        $log = $flat->user_id;



        return redirect("profile/$log");


    }
}
