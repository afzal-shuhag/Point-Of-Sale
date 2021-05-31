@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Supplier/Product Wise Stock</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
              <h3>Select Criteria
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <!-- <div class="col-sm-12 text-center">
                  <strong>Customer Wise Due Report</strong>
                  <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value"> &nbsp; &nbsp;
                  <strong>Customer Wise Paid Report</strong>
                  <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">
                </div> -->
                  <font style="color:red;">{{ ($errors->has('customer_id')) ? ($errors->first('customer_id')) : '' }}</font>
              </div>
              <div class="">
                <h3>Customer Wise Due Report</h3>
              </div>
              <div class="show_credit" style="">
                <form class="" id="creditWiseForm" action="{{ route('customers.individual.report.credit') }}" method="GET" target="_blank">
                  <div class="form-row">
                    <div class="col-sm-8">
                      <label for="">Customer Name</label>
                      <select class="form-control select2" name="customer_id">
                        <option value="">Select Customer</option>
                        @foreach($due_list as $payment)
                          <option value="{{$payment->customer->id}}">{{ $payment->customer->name }} ({{ $payment->customer->mobile_no }} - {{ $payment->customer->address }})</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('customer_id')) ? ($errors->first('customer_id')) : '' }}</font>
                    </div>
                    <div class="col-sm-4" style="padding-top:30px;">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="mt-5">
                <h3>Customer Wise Paid Report</h3>
              </div>
              <div class="show_paid" style="">
                <form class="" id="paidWiseForm" action="{{ route('customers.individual.report.paid') }}" method="GET" target="_blank">
                  <div class="form-row">
                    <div class="col-md-8">
                      <label for="name">Customer Name</label>
                      <select class="form-control select2" name="customer_id">
                        <option value="">Select Customer</option>
                        @foreach($paid_list as $payment)
                          <option value="{{$payment->customer->id}}">{{ $payment->customer->name }} ({{ $payment->customer->mobile_no }} -  {{$payment->customer->address }})</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('customer_id')) ? ($errors->first('customer_id')) : '' }}</font>
                    </div>

                    <div class="col-sm-4" style="padding-top:30px;">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </div>
                  </div>
                </form>
              </div>
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


<!-- <script type="text/javascript">
  $(function(){
    $(document).on('change','.search_value',function(){
      var search_value = $(this).val();
      if(search_value == 'customer_wise_credit'){
        $('.show_credit').show();
      }else{
        $('.show_paid').hide();
      }
    });
  });
</script> -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','.search_value',function(){
      var search_value = $(this).val();
      if(search_value == 'customer_wise_credit'){
        $('.show_credit').show();
      }else{
        $('.show_paid').hide();
      }

      if(search_value == 'customer_wise_paid'){
        $('.show_paid').show();
      }else{
        $('.show_credit').hide();
      }
    })
  });
</script>

@endsection
