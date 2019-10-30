<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
      'state',
      'city',
      'road',
      'civ_num',
      'lati',
      'long',
      'flat_id'
    ];

    public function flat() {

        return $this->belongsTo(Flat::class);
    }
}
