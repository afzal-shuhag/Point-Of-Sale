<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Wise Credit PDF</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div style="margin:0 auto; text-align:center">
          <p style="text-align:center">Customer wise Paid Report</p>
          <strong><span style="font-size:20px;">Team Learner POS <br>
            Shibganj,Sylhet
          </span></strong>
          <p style="text-align:center">Call : +8801720553737</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="com-md-12">
          <table width="100%" border="1">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Paid Amount</th>
                  <th>Due Amount</th>
                </tr>
              </thead>
              <tbody>
                  @php
                    $total = '0';
                  @endphp
                @foreach($allData as $payment)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $payment->customer->name }}
                  ({{ $payment->customer->mobile_no }}--{{ $payment->customer->address }})</td>
                  <td>#{{ $payment->invoice->invoice_no }}</td>
                  <td>{{ date('d-m-Y',strtotime($payment->invoice->date)) }}</td>
                  <td>{{ $payment->paid_amount }}</td>
                  <td>{{ $payment->due_amount }}</td>
                </tr>
                  @php
                   $total += $payment->paid_amount;
                  @endphp
                @endforeach
                <tr>
                  <td  style="text-align:right;" colspan="4">Grand Paid Total</td>
                  <td>{{ $total }}</td>
                </tr>
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
