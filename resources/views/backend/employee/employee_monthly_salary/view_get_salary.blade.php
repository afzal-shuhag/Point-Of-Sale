@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee Monthly Salary</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employee</li>
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
          <div class="card-body">
            <a class="btn btn-info" href="{{ route('employee.monthly.salary.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              <h3>Search Criteria
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table class="table-sm table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Employee Name</th>
                    <th>Basic Salary</th>
                    <th>Salary This Month</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($data as $key => $attend)
                @php
                $total_attend = App\Model\EmployeeAttendance::with(['user'])->where('employee_id',$attend->employee_id)->where($where)->get();
                $absent_count = count($total_attend->where('attend_status','Absent'));
                $salary = $attend->user->salary;
                $salary_per_day = $salary/30;
                $total_salary_minus = $absent_count*$salary_per_day;
                $total_salary = $salary - $total_salary_minus;
                @endphp
                <tbody>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $attend->user->name }}</td>
                  <td>{{ $attend->user->salary }} TK</td>
                  <td>{{ $total_salary }} TK</td>
                  <td><a class="btn btn-sm btn-success" title="Payslip" target="_blank" href="{{ route('employee.monthly.salary.payslip', $attend->employee_id) }}">Pay Slip</a></td>
                </tbody>
                @endforeach
              </table>
            </div>
            <!-- <div class="card-body">
              <div id="documentResults"></div>
              <script id="document-template" type="text/x-handlebars-template">
                <table class="table-sm table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      @{{{thsource}}}
                    </tr>
                  </thead>
                  <tbody>
                    @{{#each this}}
                    <tr>
                      @{{{tdsource}}}
                    </tr>
                    @{{/each}}
                  </tbody>
                </table>
              </script>
            </div> -->

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
