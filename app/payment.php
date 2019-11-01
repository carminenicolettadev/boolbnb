<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = [
      'price',
      'time'

    ];

  public function flats() {

      return $this -> belongsToMany(Payment::class);
  }
}
