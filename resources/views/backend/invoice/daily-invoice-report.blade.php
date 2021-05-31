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
            <li class="breadcrumb-item active">Invoices</li>
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
                <!-- <a href="{{ route('invoice.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Invoice List</a> -->
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" action="{{ route('invoice.daily.report.pdf') }}" target="_blank" method="GET">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="name">Start Date</label>
                    <input class="form-control form-control-sm" type="date" id="start_date" name="start_date"
                     min="2018-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('start_date')) ? ($errors->first('start_date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="name">End Date</label>
                    <input class="form-control form-control-sm" type="date" id="end_date" name="end_date"
                     min="2018-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('end_date')) ? ($errors->first('end_date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-1" style="padding-top:30px;">
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

<!-- <script>
  $('#datepicker').datepicker({
    uiLibrary: 'boostrap4',
    format: 'yyyy-mm-dd'
  });
</script> -->
<!-- /.content-wrapper -->

@endsection
