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
        $tablerif =\Db::table('flats')->get();
=======

        $tablerif = \DB::table('flats')->get();
>>>>>>> getFlats
        $number = count($tablerif);
        for ($i=1; $i <=$number ; $i++) { 
            factory(Address::class,1)->create([
                "flat_id" => $i
            ]);
        }
<<<<<<< HEAD
=======

>>>>>>> getFlats
    }
}
