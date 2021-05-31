@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Credit Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
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
              <h3>Edit Invoice #{{ $payment->invoice->invoice_no }}
                <a href="{{ route('customers.credit') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Credit Customer List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table width="100%">
                  <tr>
                    <td width="40%"><p> <strong>Customer Name: </strong> {{ $payment->customer->name }}</p></td>
                    <td width="25%"><p> <strong>Mobile No: </strong> {{ $payment->customer->mobile_no }}</p></td>
                    <td width="30%"><p> <strong>Address: </strong> {{ $payment->customer->address }}</p></td>
                  </tr>
              </table>
              <form class="" action="{{ route('invoice.update', $payment->invoice_id) }}" method="post" id="myForm">
                @csrf
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
                  </tbody>
                </table>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="">Paid Staus</label>
                    <select id="paid_status" name="paid_status" class="form-control form-control-sm">
                      <option value="">Select Status</option>
                      <option value="full_paid">Full Paid</option>
                      <option value="partial_paid">Partial Paid</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('paid_status')) ? ($errors->first('paid_status')) : '' }}</font>
                    <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="name">Date</label>
                    <input class="form-control form-control-sm" type="date" id="date" name="date"
                     value=""
                     min="2018-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3" style="padding-top:32px;">
                    <button type="submit" class="btn btn-sm btn-primary">Invoice Update</button>
                  </div>
                </div>
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

<script type="text/javascript">
  $(function(){
  $(document).on('change','#paid_status',function(){
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
  });

});
</script>

@endsection
