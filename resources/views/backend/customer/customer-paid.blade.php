@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Paid Customers</h1>
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
              <h3>Paid Customers List
                <a  target="_blank" href="{{ route('customers.paid.pdf') }}" class="btn btn-success float-right"> <i class="fa fa-download"></i>Download PDF</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Paid Amount</th>
                      <th>Action</th>
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
                      <td>
                        <a   target="_blank" title="Details" href="{{ route('invoice.details.pdf',$payment->invoice_id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                    @php
                     $total += $payment->paid_amount;
                    @endphp
                    @endforeach
                  </tbody>
              </table>
              <table class="table table-bordered table-hover text-center">
                <tr>
                  <td><b>Total Grand Paid Amount : {{ $total }}</b></td>
                </tr>
              </table>
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
