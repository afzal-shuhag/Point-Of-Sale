<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\Epayment;

class Order extends Model
{

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }

  public function payment()
  {
    return $this->belongsTo(Epayment::class);
  }
}
