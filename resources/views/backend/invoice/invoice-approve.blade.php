@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Invoice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3>Invoice No #{{ $invoice->invoice_no }} ({{ date('d-m-Y', strtotime($invoice->date)) }})
                <a href="{{ route('invoice.pending.list') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Pending Invoice List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              @php
              $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
              @endphp
              <table width="100%">
                <tbody>
                  <tr>
                    <td width="15%"><p><strong>Customer Info </strong></p></td>
                    <td width="25%"><p> <strong>Name: </strong> {{ $payment->customer->name }}</p></td>
                    <td width="30%"><p> <strong>Mobile No: </strong> {{ $invoice->payment->customer->mobile_no }}</p></td>
                    <td width="30%"><p> <strong>Address: </strong> {{ $invoice->payment->customer->address }}</p></td>
                  </tr>
                  <tr>
                    <td width="15%"></td>
                    <td width="85%" colspan="3"><p><strong>Description: </strong>{{ $invoice->description }}</p></td>
                  </tr>
                </tbody>
              </table>
              <form class="" action="{{ route('approval.store', $invoice->id) }}" method="post">
                @csrf
                <table border="1" width="100%" class="text-center">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th class="text-center" style="background:#ddd">Current Stock</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $sum = 0;
                    @endphp
                    @foreach($invoice['invoice_details'] as $details)
                    <tr>
                      <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
                      <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
                      <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $details->category->name }}</td>
                      <td>{{ $details->product->name }}</td>
                      <td class="text-center" style="background:#ddd">{{ $details->product->quantity }}</td>
                      <td>{{ $details->selling_qty }}</td>
                      <td>{{ $details->unit_price }}</td>
                      <td>{{ $details->selling_price }}</td>
                    </tr>
                      @php
                        $sum += $details->selling_price;
                      @endphp
                    @endforeach
                    <tr>
                      <td colspan="6" class="text-right"><b>Sub Total</b></td>
                      <td> <strong>{{ $sum }}</strong> </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="text-right">Discount</td>
                      <td> <strong>{{ $invoice_discount->payment->discount_amount }}</strong> </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="text-right">Paid Amount</td>
                      <td> <strong>{{ $invoice_discount->payment->paid_amount }}</strong> </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="text-right">Due Amount</td>
                      <td> <strong>{{ $invoice_discount->payment->due_amount }}</strong> </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="text-right">Grand</td>
                      <td> <strong>{{ $invoice_discount->payment->total_amount }}</strong> </td>
                    </tr>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-success mt-3">Approve Invoice</button>
              </form>

            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- DIRECT CHAT -->


        </section>
        <!-- /.Left col -->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
