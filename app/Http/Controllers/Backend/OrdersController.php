<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;

class OrdersController extends Controller
{
    public function index()
    {
      $orders = Order::orderBy('id','desc')->get();
      return view('backend.orders.index', compact('orders'));
    }

    public function show($id)
    {
      $order = Order::find($id);
      $order->is_seen_by_admin = 1;
      $order->save();
      return view('backend.orders.view', compact('order'));
    }

    public function completed($id)
    {
      $order = Order::find($id);

      if($order->is_completed)
      {
        $order->is_completed = 0;
      }
      else {
        $order->is_completed = 1;
      }
      $order->save();
      session()->flash('success_message_top','Order Status has been changed!!');
      return back();
    }

    public function Paid($id)
    {
      $order = Order::find($id);

      if($order->is_paid)
      {
        $order->is_paid = 0;
      }
      else {
        $order->is_paid = 1;
      }
      $order->save();
      session()->flash('success_message_top','Order Paid has been changed!!');
      return back();
    }

    public function chargeUpdate(Request $request, $id)
    {
      $order = Order::find($id);
      $order->shipping_charge = $request->shipping_charge;
      $order->custom_discount = $request->custom_discount;
      $order->save();
      session()->flash('success_message_top','Order charge and discount has been changed!!');
      return back();
    }

    public function generateInvoice($id)
    {
      // $order = Order::find($id);
      // //return view('backend.pages.orders.invoice', compact('order'));
      // $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));
      // set_time_limit(300);
      // $pdf->stream('invoice.pdf');
      // return $pdf->download('invoice.pdf');
    }
}
