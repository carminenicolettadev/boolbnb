<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = [
      'price'


    ];

  public function flats() {

<<<<<<< HEAD
      return $this -> belongsToMany(Flat::class) -> withPivot('expiration');;
=======
      return $this -> belongsToMany(Flat::class) -> withPivot('expiration');
>>>>>>> 577df407ab630fe8f4349568829f5f23c263d1ef
  }
}
