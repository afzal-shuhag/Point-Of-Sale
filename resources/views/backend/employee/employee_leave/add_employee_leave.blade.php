@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee Leave</h1>
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
                Edit Employee Leave
                @else
                Add Employee Leave
                @endif
                <a href="{{ route('employee.leave.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Employee Leave List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ (@$editData) ? route('employee.leave.update',$editData->id) : route('employee.leave.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="employee">Employee Name <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="employee_id">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                      <option value="{{$employee->id}}" {{ (@$editData->employee_id == $employee->id) ? 'selected' : '' }} >{{ $employee->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('employee_id')) ? ($errors->first('employee_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="start_date">Start Date <font style="color:red;">*</font></label>
                    <input class="form-control form-control-sm" type="date" id="date" name="start_date"
                     value="{{@$editData->start_date}}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('start_date')) ? ($errors->first('start_date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="end_date">End Date <font style="color:red;">*</font></label>
                    <input class="form-control form-control-sm" type="date" id="date" name="end_date"
                     value="{{@$editData->end_date}}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('end_date')) ? ($errors->first('end_date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="employee">Leave Purpose <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="leave_purpose_id" id="leave_purpose_id">
                      <option value="">Select Purpose</option>
                      @foreach($leave_purpose as $value)
                      <option value="{{$value->id}}" {{ (@$editData->leave_purpose_id == $value->id) ? 'selected' : '' }} >{{ $value->name }}</option>
                      @endforeach
                      <option value="0">New Purpose</option>
                    </select>
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Write New Purpose" id="add_others" style="display:none;">
                    <font style="color:red;">{{ ($errors->has('leave_purpose_id')) ? ($errors->first('leave_purpose_id')) : '' }}</font>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ (@$editData)?'Update' : 'Submit' }}</button>
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
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id', function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add_others').show();
      }else{
        $('#add_others').hide();
      }
    });
  });
</script>

@endsection
