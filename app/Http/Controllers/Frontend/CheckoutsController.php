<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Epayment;
use App\Model\Order;
use App\Cart;

class CheckoutsController extends Controller
{
  public function index()
  {
      $payments = Epayment::orderBy('priority','asc')->get();
      return view('frontend.pages.checkouts',compact('payments'));
  }


  public function store(Request $request)
  {
      $this->validate($request, [
        'name' => 'required',
        'phone_no' => 'required',
        'shipping_address' => 'required',
        'payment_method_id' => 'required',
      ]);

      $order = new Order();

      if($request->payment_method_id != 1)
      {
        if($request->transaction_id == NULL || empty($request->transaction_id))
        {
          session()->flash('sticky_error','Please Give your Transaction ID');
          return back();
        }
      }

      $order->name = $request->name;
      $order->email = $request->email;
      $order->phone_no = $request->phone_no;
      $order->shipping_address = $request->shipping_address;
      $order->message = $request->message;
      $order->ip_address = request()->ip();
      $order->transaction_id = $request->transaction_id;
      // if(Auth::check())
      // {
      //   $order->user_id = Auth::id();
      // }

      // $order->payment_id = Payment::where('id', $request->payment_method_id)->first();
      $order->payment_id = $request->payment_method_id;
      $order->save();

      foreach(Cart::totalCarts() as $cart){
        $cart->order_id = $order->id;
        $cart->save();
      }

      session()->flash('success','Your order has been placed. Our admin will Confirm it soon!!');
      return redirect()->route('frontend.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }


}
