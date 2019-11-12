<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;
use App\Flat;
use App\User;

class PaymentsController extends Controller
{

    public function index($id) {

        $singleFlat = Flat::findOrFail($id);

        $userID = $singleFlat -> user_id;
        $user = User::where('id', $userID)->get();
        $user = $user[0];

        return view('payment', compact('singleFlat', 'user'));
    }
    
    public function make(Request $request) {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = Braintree_Transaction::sale([
                                'amount' => '12.50',
                                'paymentMethodNonce' => $nonce,
                                'options' => [
                                        'submitForSettlement' => True
                                            ]
                ]);
        return response()->json($status);
    }
}