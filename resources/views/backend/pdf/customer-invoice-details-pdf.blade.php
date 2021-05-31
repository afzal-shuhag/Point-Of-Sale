<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invoice PDF Details</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div style="margin:0 auto; text-align:center">
          <p style="text-align:center">Invoice No : #{{ $payment->invoice->invoice_no }}</p>
          <strong><span style="font-size:20px;">Team Learner POS <br>
            Shibganj,Sylhet
          </span></strong>
          <p style="text-align:center">Call : +8801720553737</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="com-md-12">
          <table width="100%">
              <tr>
                <td width="40%"><p> <strong>Customer Name: </strong> {{ $payment->customer->name }}</p></td>
                <td width="25%"><p> <strong>Mobile No: </strong> {{ $payment->customer->mobile_no }}</p></td>
                <td width="30%"><p> <strong>Address: </strong> {{ $payment->customer->address }}</p></td>
              </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="com-md-12">
          <table border="1" width="100%" class="text-center">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              @php
                $sum = 0;
                $invoice_details = App\Model\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
              @endphp
              @foreach($invoice_details as $details)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $details->category->name }}</td>
                <td>{{ $details->product->name }}</td>
                <td>{{ $details->selling_qty }}</td>
                <td>{{ $details->unit_price }}</td>
                <td>{{ $details->selling_price }}</td>
              </tr>
                @php
                  $sum += $details->selling_price;
                @endphp
              @endforeach
              <tr>
                <td colspan="5" class="text-right"><b>Sub Total</b></td>
                <td> <strong>{{ $sum }}</strong> </td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Discount</td>
                <td> <strong>{{ $payment->discount_amount }}</strong> </td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Paid Amount</td>
                <td> <strong>{{ $payment->paid_amount }}</strong> </td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Due Amount</td>
                <input type="hidden" name="due_amount" value="{{ $payment->due_amount }}">
                <td> <strong>{{ $payment->due_amount }}</strong> </td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Grand</td>
                <td> <strong>{{ $payment->total_amount }}</strong> </td>
              </tr>
              <tr>
                <td colspan="6" style="text-align:center; font-weight:bold;">Paid Summery</td>
              </tr>
              <tr>
                <td colspan="3"><strong>Date</strong></td>
                <td colspan="3"><strong>Amount</strong></td>
              </tr>
              @php
                $payment_details = App\Model\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
              @endphp
              @foreach($payment_details as $details)
              <tr>
                <td colspan="3">{{ date('d-m-Y', strtotime($details->date)) }}</td>
                <td colspan="3">{{ $details->current_paid_amount }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
            <?php
              $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
             ?>
             <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
        </div>
      </div>
    </div>
  </body>
</html>
