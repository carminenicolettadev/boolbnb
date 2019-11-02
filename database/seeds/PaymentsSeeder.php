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
          $payment -> flats() -> attach($flats);
          $payment -> save();
        });
    }
}
