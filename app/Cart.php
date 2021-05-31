<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Eproduct;

class Cart extends Model
{

  public function eproduct()
  {
    return $this->belongsTo(Eproduct::class,'product_id','id');
  }

  public static function totalCarts()
  {

    $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();

    return $carts;
  }

  public static function totalItems(){

    $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();


    $total_items = 0;
    foreach($carts as $cart)
    {
      $total_items += $cart->product_quantity;
    }

    return $total_items;
    }
}
