<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;
use DB;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {

        // Rilevare dalla tabella Flat-Payment il valore di "expiration"
        // e mostrare se ($expiration > DataEOraDiOggi)

          $payments = DB::table('flat_payment')->get();
          $date =strtotime(date("Y-m-d H:i:s",time()));
          $paymentexpiration;
          $flats=[];
          // dd(strtotime($date));


          for ($i=0; $i <count($payments) ; $i++) {
            $paymentexpiration = strtotime($payments[$i]->expiration);
            if($paymentexpiration >= $date){
              $flats[]=Flat::findOrFail($payments[$i]->flat_id);
            }else {
              var_dump("non sei in evidenza");
            }

          }






         $flatsrates = Flat::orderBy("rate","desc")->take(6)->get();

         return view('welcome',compact('flats','flatsrates'));




     }
}
