<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{

  protected $fillable = [
    'views','rate','user_id'
  ];

  public function user() {

      return $this -> belongsTo(User::class);
  }

  public function detail() {

      return $this->hasOne(Detail::class);
  }

  public function address() {

      return $this->hasOne(Address::class);
  }

}
