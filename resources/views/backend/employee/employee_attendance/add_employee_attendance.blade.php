@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee Attendance</h1>
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
          <div class="card">
            <div class="card-header">
              <h3>
                @if(isset($editData))
                Edit Employee Attendance
                @else
                Add Employee Attendance
                @endif
                <a href="{{ route('employee.attendance.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Employee Attendance List</a>
              </h3>

            </div><!-- /.card-header -->
            <form class="" action="{{ route('employee.attendance.store') }}" method="post" id="myForm">
            @if(isset($editData))
            @csrf
            <div class="card-body">
              <div class="form-group col-md-4">
                <label for="">Attendance Date <font style="color:red;">*</font></label>
                <input readonly class="form-control form-control-sm" type="date" id="date" name="date"
                 value="{{@$editData[0]->date}}"
                 min="1990-01-01" max="2040-12-31">
                <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
              </div>
            </div>
            <table class="table-sm table-bordered table-striped dt-responsive" style="width:100%;">
              <thead>
                <tr>
                  <th rowspan="2" class="text-center" style="vertical-align:middle;">SL</th>
                  <th rowspan="2" class="text-center" style="vertical-align:middle;">Employee Name</th>
                  <th colspan="3" class="text-center" style="vertical-align:middle; width:25%;">Attendance Status</th>
                </tr>
                <tr>
                  <th  class="text-center btn present_all" style="display:table-cell;background-color:#114190;">Present</th>
                  <th  class="text-center btn leave_all" style="display:table-cell;background-color:#114190">Leave</th>
                  <th  class="text-center btn absent_all" style="display:table-cell;background-color:#114190">Absent</th>
                </tr>
              </thead>
              <tbody>
                @foreach($editData as $key=>$data)
                  <tr id="div{{$data->id}}" class="text-center">
                    <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}" class="employee_id">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td colspan="3">
                      <div class="switch-toggle switch-3 switch-candy">
                        <input type="radio" class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" {{($data->attend_status == 'Present') ? 'checked' : ''}}>
                        <label for="present{{$key}}">Present</label>

                        <input type="radio" class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" {{($data->attend_status == 'Leave') ? 'checked' : ''}}>
                        <label for="leave{{$key}}">Leave</label>

                        <input type="radio" class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" {{($data->attend_status == 'Absent') ? 'checked' : ''}}>
                        <label for="absent{{$key}}">Absent</label>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table> <br>
            <button type="submit" class="btn btn-success btn-sm mb-5 ml-3">{{ (@$editData) ? 'Update' : 'Submit' }}</button>
            @else
              @csrf
              <div class="card-body">
                <div class="form-group col-md-4">
                  <label for="">Attendance Date <font style="color:red;">*</font></label>
                  <input class="form-control form-control-sm" type="date" id="date" name="date"
                   value="{{@$editData[0]->date}}"
                   min="1990-01-01" max="2040-12-31">
                  <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                </div>
              </div>
              <table class="table-sm table-bordered table-striped dt-responsive" style="width:100%;">
                <thead>
                  <tr>
                    <th rowspan="2" class="text-center" style="vertical-align:middle;">SL</th>
                    <th rowspan="2" class="text-center" style="vertical-align:middle;">Employee Name</th>
                    <th colspan="3" class="text-center" style="vertical-align:middle; width:25%;">Attendance Status</th>
                  </tr>
                  <tr>
                    <th  class="text-center btn present_all" style="display:table-cell;background-color:#114190;">Present</th>
                    <th  class="text-center btn leave_all" style="display:table-cell;background-color:#114190">Leave</th>
                    <th  class="text-center btn absent_all" style="display:table-cell;background-color:#114190">Absent</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($employees as $key=>$employee)
                    <tr id="div{{$employee->id}}" class="text-center">
                      <input type="hidden" name="employee_id[]" value="{{ $employee->id }}" class="employee_id">
                      <td>{{ $key+1 }}</td>
                      <td>{{ $employee->name }}</td>
                      <td colspan="3">
                        <div class="switch-toggle switch-3 switch-candy">
                          <input type="radio" class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" checked="checked">
                          <label for="present{{$key}}">Present</label>

                          <input type="radio" class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave">
                          <label for="leave{{$key}}">Leave</label>

                          <input type="radio" class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent">
                          <label for="absent{{$key}}">Absent</label>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table> <br>
              <button type="submit" class="btn btn-success btn-sm mb-5 ml-3">{{ (@$editData) ? 'Update' : 'Submit' }}</button>

            @endif
            </form>
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

<script type="text/javascript">
  $(document).on('click', '.present_all', function(){
    $('input[value=Present]').prop('checked',true);
  });
  $(document).on('click', '.leave_all', function(){
    $('input[value=Leave]').prop('checked',true);
  });
  $(document).on('click', '.absent_all', function(){
    $('input[value=Absent]').prop('checked',true);
  });
</script>

@endsection
