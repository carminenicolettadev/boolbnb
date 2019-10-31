<?php

use Illuminate\Database\Seeder;
use App\Flat;
use App\User;
class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Flat::class, 400)
            -> make()
            -> each(function($flat) {

          $user = User::inRandomOrder()->first();
          //funzione category = category_id
          $flat -> user() -> associate($user);

          $flat -> save();

      });
    }
}
