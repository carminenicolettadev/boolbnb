<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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







}
