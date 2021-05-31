<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Eproduct;
use App\Cart;

class CartsController extends Controller
{

    public function index()
    {
        return view('frontend.pages.carts');
    }

    public function store(Request $request)
    {

        $this->validate($request,
        [
          'product_id' => 'required',
        ],
        [
          'product_id.required' => 'Please give a product ',
        ]);

          // $cart = Cart::orWhere('user_id', Auth::id())
          //               // ->orWhere('ip_address', request()->ip())
          //               ->where('product_id', $request->product_id)
          //               ->where('order_id', NULL)
          //               ->first();

          $cart = Cart::where('ip_address', request()->ip())
                        ->where('product_id', $request->product_id)
                        ->where('order_id', NULL)
                        ->first();


        if(!is_null($cart))
        {
          $cart->increment('product_quantity');
        }
        else
        {
          $cart = new Cart();

          // if(Auth::check())
          // {
          //
          //   $cart->user_id = Auth::id();
          // }
          // else
          // {
          //
          // }

          $cart->ip_address = request()->ip();
          $cart->product_id = $request->product_id;
          $cart->save();
        }

        session()->flash('success_message_top','Product has been added to cart!!');
        return back();

    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart))
        {
          $cart->product_quantity = $request->product_quantity;
          $cart->save();
        }
        else
        {
          return redirect()->route('carts');
        }
        session()->flash('success','Cart Item updated!!!');
        return back();
    }

    public function destroy($id)
    {
      $cart = Cart::find($id);
      if(!is_null($cart))
      {
        $cart->delete();
      }
      else
      {
        return redirect()->route('carts');
      }
      session()->flash('success','Cart Item deleted!!!');
      return back();
    }

    // public static function discount(Request $request,$id)
    // {
    //   dd('hh');
    //   $dis = $request->discount;
    //   $total = $id;
    //   $final_total_amount = $total * ($dis/100);
    //
    //   return $final_total_amount;
    // }
}
