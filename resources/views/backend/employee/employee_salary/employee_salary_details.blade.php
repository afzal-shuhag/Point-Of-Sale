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
                Employee Salary Details
                <a href="{{ route('employee.salary.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Employee Salary List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Employee ID No</th>
                    <th>Previous Salary</th>
                    <th>Incremented Salary</th>
                    <th>Present Salary</th>
                    <th>Effected Date</th>
                  </tr>
                </thead>
                @foreach($salary_log as $value)
                <tbody>
                  <td> {{ $value->user->name }} </td>
                  <td> {{ $value->user->id_no }} </td>
                  <td>{{ $value->previous_salary }}</td>
                  <td>{{ $value->increment_salary }}</td>
                  <td>{{ $value->present_salary }}</td>
                  <td>{{ date('d-m-Y',strtotime($value->effected_date)) }}</td>
                </tbody>
                @endforeach
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
