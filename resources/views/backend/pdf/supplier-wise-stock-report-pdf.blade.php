<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Stock Report PDF</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div style="margin:0 auto; text-align:center">
          <p style="text-align:center"><b>Supplier Wise Stock Report</b></p>
          <strong><span style="font-size:20px;">Team Learner POS <br>
            Shibganj,Sylhet
          </span></strong>
          <p style="text-align:center">Call : +8801720553737</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <h3>Supplier Name : {{ $allData['0']->supplier->name }}</h3>
        <table border="1" width="100%">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Category</th>
                <th>Product Name</th>
                <th width="15%">In. Qty</th>
                <th width="15%">Out. Qty</th>
                <th>Stock</th>
                <th>Unit</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $product)
              @php
                $buying_total =  App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                $selling_total =  App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
              @endphp
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $buying_total }}</td>
                <td>{{ $selling_total }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->unit->name }}</td>
              </tr>
              @endforeach
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
