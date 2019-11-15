<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree_Gateway;
use App\Flat;
use App\User;

class PaymentsController extends Controller
{

    public function index($id) {

        $singleFlat = Flat::findOrFail($id);

        // $userID = $singleFlat -> user_id;
        // $user = User::where('id', $userID)->get();
        // $user = $user[0];

        return view('payment', compact('singleFlat', 'user'));
    }

    /*  Function is to process payment on braintree */
    public function make(Request $request)
    {
      $payload = $request->input('payload', false);
      $nonce = $payload['nonce'];
      $gateway = $this->brainConfig();
      $status = $gateway->transaction()->sale([
                      'amount' => '10.00',
                      'paymentMethodNonce' => $nonce,
                      'options' => [
                          'submitForSettlement' => True
                    ]
                  ]);
      return response()->json($status);
    }

    public function brainConfig()
    {
      return $gateway = new Braintree_Gateway([
                        'environment' => env('BRAINTREE_ENV'),
                        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
                    ]);
    }
}
