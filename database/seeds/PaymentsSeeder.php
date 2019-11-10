<?php

use Illuminate\Database\Seeder;
use App\Payment;
use App\Flat;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, 10)
        -> create()
        -> each(function ($payment){

          $flats = Flat::inRandomOrder()->take(rand(0, 200))->get();

          // Impostiamo data random per popolare colonna expiration
          $dataRandom = '2019-11-10 16:15:00';
          $expiration = $dataRandom;

          $payment -> flats() -> attach($flats, ['expiration' => $expiration]);
          $payment -> save();
        });
    }
}
