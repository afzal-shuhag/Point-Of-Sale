@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Password</li>
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
              <h3>Change Password

              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('profiles.password.update') }}" id="myForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <font style="color:red;">{{ ($errors->has('password')) ? ($errors->first('password')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="password">Confrim Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation">
                    <font style="color:red;">{{ ($errors->has('password')) ? ($errors->first('password')) : '' }}</font>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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
