<?php

use Illuminate\Database\Seeder;
use App\Address;
class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
=======
        
>>>>>>> a938624d8d426cf3f3f335aeb28ee0fcce5c7d0b
        $tablerif = \DB::table('flats')->get();
        $number = count($tablerif);

        for ($i=1; $i <= $number ; $i++) {
          factory(Address::class, 1)->create([
            'flat_id' => $i

          ]);
        }
<<<<<<< HEAD
=======
  
>>>>>>> a938624d8d426cf3f3f335aeb28ee0fcce5c7d0b
    }
}
