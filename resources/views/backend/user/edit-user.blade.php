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
              <h3>Edit User
                <a href="{{ route('users.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>User List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('users.update',$editData->id) }}" id="myForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="role">User Role</label>
                    <select class="form-control" name="role">
                      <option value="">Select Role</option>
                      <option value="Admin" {{ ($editData->role == "Admin") ? 'selected' : '' }}>Admin</option>
                      <option value="User" {{ ($editData->role == "User") ? 'selected' : '' }}>User</option>
                      <option value="Employee" {{ ($editData->role == "Employee") ? 'selected' : '' }}>Employee</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('role')) ? ($errors->first('role')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$editData->name}}">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$editData->email}}">
                    <font style="color:red;">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
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
