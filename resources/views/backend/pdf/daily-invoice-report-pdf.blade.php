<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PDF</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div style="margin:0 auto; text-align:center">
          <p style="text-align:center">Invoice Report ({{ date('Y-m-d', strtotime($start_date)) }} - {{ date('Y-m-d', strtotime($end_date)) }})</p>
          <strong><span style="font-size:20px;">Team Learner POS <br>
            Shibganj,Sylhet
          </span></strong>
          <p style="text-align:center">Call : +8801720553737</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <table border="1" width="100%">
              <tr>
                <th>SL.</th>
                <th>Custome Name</th>
                <th>Invoice No</th>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
              </tr>
            <tbody>
              <?php
                $sum = '0';
               ?>
              @foreach($allData as $invoice)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>({{ $invoice->payment->customer->name }} - {{ $invoice->payment->customer->mobile_no }} - {{ $invoice->payment->customer->address }})</td>
                <td>#{{ $invoice->invoice_no }}</td>
                <td>{{ date('d-m-Y', strtotime($invoice->date)) }}</td>
                <td>{{ $invoice->description }}</td>
                <td>{{ $invoice->payment->total_amount }}</td>
                <?php
                  $sum += $invoice->payment->total_amount;
                 ?>
              </tr>
              @endforeach
              <tr>
                <td colspan="5" style="text-align:right;">Grand Total</td>
                <td>{{ $sum }}</td>
              </tr>
            </tbody>
        </table>
      </div>
      <div class="row">
        <div class="com-md-12">
            <?php
              $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
             ?>
             <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
        </div>
      </div>
    </div>
  </body>
</html>
