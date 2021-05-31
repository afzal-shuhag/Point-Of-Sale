@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
              <h3>Add User
                <a href="{{ route('users.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>User List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('users.store') }}" id="myForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="role">User Role</label>
                    <select class="form-control" name="role">
                      <option value="">Select Role</option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                      <option value="Employee">Employee</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('role')) ? ($errors->first('role')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <font style="color:red;">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <font style="color:red;">{{ ($errors->has('password')) ? ($errors->first('password')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="password">Confrim Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation">
                  </div> -->
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
