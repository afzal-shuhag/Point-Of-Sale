@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee Salary</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employee Salary</li>
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
              <h3>
                Increment Employee Salary
                <a href="{{ route('employee.salary.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Employee Salary List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('employee.salary.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="name">Salary Amount</label>
                    <input type="text" class="form-control" id="increment_salary" name="increment_salary">
                    <font style="color:red;">{{ ($errors->has('increment_salary')) ? ($errors->first('increment_salary')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dob">Effected Date <font style="color:red;">*</font></label>
                    <input class="form-control" type="date" id="date" name="effected_date"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('effected_date')) ? ($errors->first('effected_date')) : '' }}</font>
                  </div>
                  <div class="col-md-2 form-group" style="margin-top:33px;">
                    <button type="submit" class="btn btn-primary btn-sm">Update Salary</button>
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
@endsection
