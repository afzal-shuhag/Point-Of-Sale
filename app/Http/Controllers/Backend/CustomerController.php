<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\Payment;
use App\Model\PaymentDetail;
use Auth;
use PDF;


class CustomerController extends Controller
{
  public function view()
  {
    $allData = Customer::all();
    return view('backend.customer.view-customers',compact('allData'));
  }

  public function add()
  {
    return view('backend.customer.add-customer');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'address' => 'required',
      'mobile_no' => 'required',
    ]);

    $customer = new Customer();

    $customer->name = $request->name;
    $customer->mobile_no = $request->mobile_no;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->created_by = Auth::user()->id;
    $customer->save();

    return redirect()->route('customers.view')->with('success_message_top', 'Data Inserted Successfully!!');
  }

  public function edit($id)
  {
    $editData = Customer::find($id);
    return view('backend.customer.edit-customer', compact('editData'));
  }

  public function update(Request $request,$id)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'address' => 'required',
      'mobile_no' => 'required',
    ]);

    $customer = Customer::find($id);

    $customer->name = $request->name;
    $customer->mobile_no = $request->mobile_no;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->updated_by = Auth::user()->id;
    $customer->save();

    return redirect()->route('customers.view')->with('success_message_top', 'Data Updated Successfully!!');
  }

  public function delete($id)
  {
    $customer = Customer::find($id);
    $customer->delete();
    return redirect()->route('customers.view')->with('success_message_top', 'Data deleted Successfully!!');
  }

  public function creditCustomer()
  {
    $allData = Payment::whereIn('paid_status',['partial_paid','full_due'])->get();
    return view('backend.customer.customer-credit',compact('allData'));
  }

  public function creditCustomerPdf()
  {
    $data['allData'] = Payment::whereIn('paid_status',['partial_paid','full_due'])->get();
    $pdf = PDF::loadView('backend.pdf.customer-credit-pdf', $data);
  	$pdf->SetProtection(['copy', 'print'], '', 'pass');
  	return $pdf->stream('document.pdf');
  }

  public function invoiceEdit($invoice_id)
  {
    $payment = Payment::where('invoice_id',$invoice_id)->first();
    return view('backend.customer.edit-invoice',compact('payment'));
  }

  public function invoiceUpdate(Request $request, $invoice_id)
  {
    $this->validate($request,[
      'paid_status' => 'required',
      'date' => 'required',
    ]);
    if($request->due_amount < $request->paid_amount){
      return redirect()->back()->with('error_message_top', 'Sorry You have entered more than original due!!');
    }else{
      $payment = Payment::where('invoice_id',$invoice_id)->first();
      $payment_details = new PaymentDetail();
      $payment->paid_status = $request->paid_status;
      if($request->paid_status == 'full_paid'){
        $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->due_amount;
        $payment->due_amount = '0';
        $payment_details->current_paid_amount = $request->due_amount;
      }elseif($request->paid_status == 'partial_paid'){
        $payment->paid_amount = $payment->paid_amount+$request->paid_amount;
        $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
        $payment_details->current_paid_amount = $request->paid_amount;
      }
      $payment->save();
      $payment_details->invoice_id = $invoice_id;
      $payment_details->date = date('Y-m-d',strtotime($request->date));
      $payment_details->save();

      return redirect()->route('customers.credit')->with('success_message_top','Invoice Successfully Updated!');

    }
  }

  public function invoiceDetailsPdf($invoice_id)
  {
    $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
    $pdf = PDF::loadView('backend.pdf.customer-invoice-details-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
  }

  public function paidCustomer()
  {
    $allData = Payment::where('paid_status','full_paid')->get();
    return view('backend.customer.customer-paid',compact('allData'));
  }

  public function paidCustomerPdf($value='')
  {
    $data['allData'] = Payment::where('paid_status','full_paid')->get();
    $pdf = PDF::loadView('backend.pdf.customer-paid-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
  }

  public function customerWiseReport()
  {
    $data['paid_list'] = Payment::where('paid_status','full_paid')->get();
    $data['due_list'] = Payment::whereIn('paid_status',['partial_paid','full_due'])->get();
    return view('backend.customer.customer-individual-report',$data);
  }

  public function customerWiseCreditReport(Request $request)
  {
    $this->validate($request,[
      'customer_id' => 'required',
    ]);
    $data['allData'] = Payment::where('customer_id', $request->customer_id)->whereIn('paid_status',['partial_paid','full_due'])->get();
    $pdf = PDF::loadView('backend.pdf.customer-wise-credit-pdf', $data);
  	$pdf->SetProtection(['copy', 'print'], '', 'pass');
  	return $pdf->stream('document.pdf');
  }

  public function customerWisePaidReport(Request $request)
  {
    $this->validate($request,[
      'customer_id' => 'required',
    ]);
    $data['allData'] = Payment::where('customer_id', $request->customer_id)->where('paid_status','full_paid')->get();
    $pdf = PDF::loadView('backend.pdf.customer-wise-paid-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
  }
}
