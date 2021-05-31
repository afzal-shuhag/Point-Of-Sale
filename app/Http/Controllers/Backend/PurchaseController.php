<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use DB;
use PDF;

class PurchaseController extends Controller
{
  public function view()
  {
    $data['allData'] = Purchase::orderBy('id','desc')->get();
    return view('backend.purchase.view-purchases', $data);
  }

  public function add()
  {
    $data['suppliers'] = Supplier::all();
    $data['units'] = Unit::all();
    $data['categories'] = Category::all();
    return view('backend.purchase.add-purchase', $data);
  }

  public function store(Request $request)
  {
    if($request->category_id == null){
      return redirect()->back()->with('error_message_top','Sorry,, you have not selected any item');
    }else{
      $count_category = count($request->category_id);
      for($i=0; $i<$count_category ; $i++){
        $purchase = new Purchase();
        $check = Purchase::orderBy('id','desc')->first();
        $purchase->date = date('y-m-d', strtotime($request->date[$i]));
        if ($check == null) {
          $purchase->purchase_no = 'PP'.'1';
        }else{
          $id = Purchase::orderBy('id','desc')->first()->id;
          $id = $id+1;
          $purchase->purchase_no = 'PP'.$id;
        }
        // $purchase->purchase_no = $request->purchase_no[$i];
        $purchase->supplier_id = $request->supplier_id[$i];
        $purchase->product_id = $request->product_id[$i];
        $purchase->category_id = $request->category_id[$i];
        $purchase->buying_qty = $request->buying_qty[$i];
        $purchase->unit_price = $request->unit_price[$i];
        $purchase->buying_price = $request->buying_price[$i];
        $purchase->description = $request->description[$i];
        $purchase->created_by = Auth::user()->id;
        $purchase->status = '0';
        $purchase->save();
      }
    }
    return redirect()->route('purchases.view')->with('success_message_top', 'Data Inserted Successfully!!');
  }

  public function edit($id)
  {
    $data['editData'] = Product::find($id);
    $data['suppliers'] = Supplier::all();
    $data['units'] = Unit::all();
    $data['categories'] = Category::all();
    return view('backend.product.edit-product', $data);
  }

  public function approve($id)
  {
    $purchase = Purchase::find($id);
    $product = Product::where('id', $purchase->product_id)->first();
    $purchase->status = '1';
    $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
    $product->quantity = $purchase_qty;
    // $purchase->save(); this two lines also worked for me
    // $product->save();
    if($product->save()){
      DB::table('purchases')->where('id',$id)->update(['status' => 1]);

    }

    return redirect()->route('purchases.pending.list')->with('success_message_top', 'Status Updated Successfully!!');
  }

  public function delete($id)
  {
    $purchase = Purchase::find($id);
    $purchase->delete();
    return redirect()->route('purchases.view')->with('success_message_top', 'Data deleted Successfully!!');
  }

  public function pendingApproval()
  {
    $data['allData'] = Purchase::orderBy('id','desc')->where('status','0')->get();
    return view('backend.purchase.view-pending-list', $data);
  }

  public function purchaseReport()
  {
    return view('backend.purchase.daily-purchase-report');
  }

  public function purchaseReportPdf(Request $request)
  {
    $this->validate($request,[
      'start_date' => 'required',
      'end_date' => 'required',
    ]);
    $sdate = date('Y-m-d', strtotime($request->start_date));
    $edate = date('Y-m-d', strtotime($request->end_date));
    $data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
    $data['start_date'] = date('Y-m-d', strtotime($request->start_date));
    $data['end_date'] = date('Y-m-d', strtotime($request->end_date));
    // $data['grand_total'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->sum('buying_price');
    $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
  	$pdf->SetProtection(['copy', 'print'], '', 'pass');
  	return $pdf->stream('document.pdf');
  }
}
