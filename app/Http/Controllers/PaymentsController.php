<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree_Gateway;
use App\Flat;
use App\User;
use App\Detail;

class PaymentsController extends Controller
{

    public function index($id) {

        $singleFlat = Flat::findOrFail($id);

        // $userID = $singleFlat -> user_id;
        // $user = User::where('id', $userID)->get();
        // $user = $user[0];

        $detail = Detail::where('flat_id', $id)->get();
        $detail = $detail[0];

        return view('sponsorPage', compact('singleFlat', 'user', 'detail'));
    }

    public function pagamento(Request $request) {

      $datiPagamento = $request -> validate([
        'costo' => 'required',
        'name' => 'required',
        'title' => 'required',
        'id' => 'required'
      ]);

      $costo = $datiPagamento['costo'];
      $name = $datiPagamento['name'];
      $title = $datiPagamento['title'];
      $id = $datiPagamento['id'];

      if ($costo == '2.99') {
        $ore = '24 ore';
      } else if ($costo == '5.99') {
        $ore = '72 ore';
      } else ($costo == '9.99') {
        $ore = '144 ore'
      };

      return view('payment', compact('costo', 'name', 'title', 'ore', 'id'));
    }

    /*  Function is to process payment on braintree */
    public function make(Request $request)
    {
      $payload = $request->input('payload', false);
      $nonce = $payload['nonce'];
      $gateway = $this->brainConfig();
      $status = $gateway->transaction()->sale([
                      'amount' => '5.55',
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

    public function storeSponsor() {

      // Salvare in Payments il valore nella colonna "price" la variabile $costo
      // Salvare in Flat-Payment il valore (data e ora) "expiration"
      // calcolato prendendo il valore dentro "created_ad" e sommandolo a "OGGI"

      return view('storeSponsor');
    }
}
