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
    public function showAllFlats()
    {

      $flats = Flat::orderBy('created_at', 'desc')->paginate(6);
      $services = Service::all();


      return view('allFlatsPage')->with('flats', $flats)
                                 ->with('services', $services);
    }



  public function filters(Request $request)
    {

      $services = Service::all();



      $arrForm = [
        'wifi'=> false,
        'piscina'=> false,
        'spa'=> false,
        'balcone'=> false,
        'giardino'=> false,
        'mare'=> false,
      ];

      $arrServices = [];

      foreach ($request -> checkboxvar  as $value ) {
        array_push($arrServices,$value);
      }

      // var_dump(array_keys($arrForm));

      for ($i=0; $i < count($arrServices); $i++) {
        foreach ($arrForm as $key => $value) {
          // var_dump($key, $value);
          if ($arrServices[$i] === $key) {
            // var_dump($arrServices[$i]);
           $arrForm[$key] = true;
          }
        }
      }



      $flats = new Flat;
      $services = Service::all();


      var_dump($arrForm);

      //Flat:: non va bene dovrebbe essere $flat
      if ($arrForm['wifi']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','wifi');
        })->get();
      }

      if ($arrForm['balcone']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','balcone');
        })->get();
      }

      if ($arrForm['mare']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','mare');
        })->get();
      }

      if ($arrForm['spa']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','spa');
        })->get();
      }

      if ($arrForm['piscina']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','piscina');
        })->get();
      }

      if ($arrForm['giardino']) {
        $flats = Flat::whereHas('services', function($query){
            $query->where('name','giardino');
        })->get();
      }


      return view('allFlatsPage')->with('flats', $flats)
                                 ->with('services', $services);



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


      $file = $request -> file('img');
        if ($file) {

          $folder = 'img';
          $nameImg = 'flat-' . $flat_id  . '.' . $file -> getClientOriginalExtension();

          $file -> move($folder, $nameImg);
          $dataTableDetails['img'] = $nameImg;

      }

      // creo un nuovo detail e associo ad ogni campo
      //il valore della request che ha i dati del form
      $detail = new Detail;
      $detail ->title = $request ->title;
      $detail ->num_room = $request ->num_room;
      $detail ->bed = $request ->bed;
      $detail ->bathroom = $request ->bathroom;
      $detail ->mq = $request ->mq;
      $detail ->img = $nameImg;
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


      //Services add
      foreach ($request -> checkboxvar  as $value ) {
        $service = Service::findOrFail($value);
        $service->flats()->attach($flat_id);
        $service->save();
      }

      $log = $flat->user_id;

      return redirect("profile/$log");
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
    public function editFlat($id)
    {
      $singleFlat = Flat::findOrFail($id);

      $detailFlat = Detail::where('flat_id', $id)->get();

      $addressFlat = Address::where('flat_id', $id)->get();



      return view('editFlat')->with('singleFlat', $singleFlat)
                                ->with('detailFlat', $detailFlat)
                                ->with('addressFlat', $addressFlat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFlat(Request $request, $id)
    {

      $flat = Flat::findOrFail($id);


      $detailData = $request -> validate([
          'title'=> 'required',
          'num_room'=> 'required',
          'bed'=> 'required',
          'bathroom'=> 'required',
          'mq'=> 'required',
          'img'=> 'required',
      ]);



      $detail = Detail::where('flat_id', $id)->get();

      // dd($request->title, $detail[0]);
      $file = $request -> file('img');
        if ($file) {

          $folder = 'img';
          $nameImg = 'flat-' . $flat->id . '.' . $file -> getClientOriginalExtension();

          $file -> move($folder, $nameImg);
          $dataTableDetails['img'] = $nameImg;

      }

      $detail[0]->update([
        'title'=> $request->title,
        'num_room'=> $request->num_room,
        'bed'=> $request->bed,
        'bathroom'=> $request->bathroom,
        'mq'=> $request->mq,
        'img'=> $nameImg,
      ]);

      //address
      $addressData = $request -> validate([
          'state'=> 'required',
          'city'=> 'required',
          'road'=> 'required',
          'civ_num'=> 'required'
      ]);

      $address = Address::where('flat_id', $id)->get();
      $address[0]->update([
        'state'=> $request->state,
        'city'=> $request->city,
        'road'=> $request->road,
        'civ_num'=> $request->civ_num,
      ]);

      // dd($detail,$address,$detailData,$addressData);


      $log = $flat->user_id;

      return redirect("profile/$log");
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
      $log = $flat->user_id;
      $flat->detail->delete();
      $flat->address->delete();
      $flat->delete();

      return redirect("profile/$log");

    }
}
