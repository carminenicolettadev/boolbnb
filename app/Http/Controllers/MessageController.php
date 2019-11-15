<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Flat;
use App\Detail;
use DB;


class MessageController extends Controller
{


    public function messageStore(Request $request, $id)
    {
      $dataMessage = request()->validate([
        'email' => 'required|email',
        'msg' => 'required'
      ]);

      $dataMessage['flat_id'] = $id;

      $message = new Message;


      $message->fill($dataMessage);
      $message = Message::create($dataMessage);


      return redirect('flat/' . $id)->with('il messaggio è stato inviato');
    }
    public function messageShow($id)
    {

      // $messages = DB::table('flats')
      // ->join('messages','flat_id', '=', 'flats.id')
      // ->where('user_id', '=', $id)
      // ->orderBy('messages.created_at')
      // ->get();
      // dd($messages);
      $flat_id = Message::select('flat_id');
      dd($flat_id);
      // $flats = Flat::where('id', $flat_id)->get();

      // dd($name);
      return view('mymesg', compact('messages'));
    }





}
