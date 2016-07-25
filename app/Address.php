<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = [
        'country',
        'postalcode',
        'city',
        'street',
        'number',
    ];

  public function users()
  {
      return $this->hasMany('App\User', 'address_id');
  }

}
