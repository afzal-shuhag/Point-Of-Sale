@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Customer</h1>
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
              <h3>Add Customer
                <a href="{{ route('customers.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Customer List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('customers.store') }}" id="myForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Mobile No</label>
                    <input type="text" class="form-control" id="email" name="mobile_no" placeholder="Mobile No">
                    <font style="color:red;">{{ ($errors->has('mobile_no')) ? ($errors->first('mobile_no')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <font style="color:red;">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    <font style="color:red;">{{ ($errors->has('address')) ? ($errors->first('address')) : '' }}</font>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
