<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Notice;
use App\Model\Customer;
use App\Model\Invoice;
use App\Model\Payment;
use App\Model\Purchase;
use App\Model\Product;
use App\Model\Supplier;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
        //$this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(Auth::user()->approved == '1'){
        $data['products'] = Product::all()->count();
        $data['suppliers'] = Supplier::all()->count();
        $data['customers'] = Customer::all()->count();
        $data['employees'] = User::where('role','employee')->get()->count();
        $date = date('Y-m');
        $invoices = Invoice::where('date','like',$date.'%')->get();
        $sum = 0;
        $due = 0;
        foreach ($invoices as $key => $value) {
          $single_sale = Payment::where('invoice_id',$value->id)->first()->paid_amount;
          $single_due = Payment::where('invoice_id',$value->id)->first()->due_amount;
          $sum += $single_sale;
          $due += $single_due;
        }
        $data['sales'] = (int)$sum;
        $data['dues'] = (int)$due;
        $data['purchases'] = Purchase::where('date','like',$date.'%')->get()->sum('buying_price');
        $data['profits'] = (int)$data['sales'] - (int)$data['purchases'];
        $data['employees'] = User::where('role','employee')->get()->count();
        $data['users'] = User::all();

        return view('backend.layouts.home',$data);
      }else{
        return view('backend.layouts.aprove');
      }
    }
}
