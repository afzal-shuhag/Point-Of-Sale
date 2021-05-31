@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee</h1>
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
                Edit Employee
                @else
                Add Employee
                @endif
                <a href="{{ route('employee.registration.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Employee List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ (@$editData) ? route('employee.registration.update',$editData->id) : route('employee.registration.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name">Employee Name <font style="color:red;">*</font> </label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{@$editData->name}}">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fname">Father Name <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="fname" name="fname" value="{{@$editData->fname}}">
                    <font style="color:red;">{{ ($errors->has('fname')) ? ($errors->first('fname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mname">Mother Name <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="mname" name="mname" value="{{@$editData->mname}}">
                    <font style="color:red;">{{ ($errors->has('mname')) ? ($errors->first('mname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile Number <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" value="{{@$editData->mobile}}">
                    <font style="color:red;">{{ ($errors->has('mobile')) ? ($errors->first('mobile')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Email<font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{@$editData->email}}">
                    <font style="color:red;">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="address" name="address" value="{{@$editData->address}}">
                    <font style="color:red;">{{ ($errors->has('address')) ? ($errors->first('address')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="gender">
                      <option value="">Select Gender</option>
                      <option value="Male" {{ (@$editData->gender == 'Male') ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ (@$editData->gender == 'Female') ? 'selected' : '' }}>Female</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('gender')) ? ($errors->first('gender')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="religion">
                      <option value="">Select Religion</option>
                      <option value="Islam" {{ (@$editData->religion == 'Islam') ? 'selected' : '' }}>Islam</option>
                      <option value="Hindu" {{ (@$editData->religion == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                      <option value="Christian" {{ (@$editData->religion == 'Christian') ? 'selected' : '' }}>Christian</option>
                      <option value="Buddhist" {{ (@$editData->religion == 'Buddhist') ? 'selected' : '' }}>Buddhist</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('religion')) ? ($errors->first('religion')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date of Birth <font style="color:red;">*</font></label>
                    <input class="form-control form-control-sm" type="date" id="date" name="dob"
                     value="{{@$editData->dob}}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('dob')) ? ($errors->first('dob')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="year_id">Designation <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="designation_id">
                      <option value="">Select Designation</option>
                      @foreach($designations as $designation)
                      <option value="{{$designation->id}}" {{ (@$editData->designation_id == $designation->id) ? 'selected' : '' }} >{{ $designation->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('designation_id')) ? ($errors->first('designation_id')) : '' }}</font>
                  </div>
                  @if(!@$editData)
                  <div class="form-group col-md-4">
                    <label for="dob">Join Date <font style="color:red;">*</font></label>
                    <input class="form-control form-control-sm" type="date" id="date" name="join_date"
                     value="{{@$editData->join_date}}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('join_date')) ? ($errors->first('join_date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Salary</label>
                    <input type="text" class="form-control form-control-sm" id="salary" name="salary" value="{{@$editData->salary}}">
                    <font style="color:red;">{{ ($errors->has('salary')) ? ($errors->first('salary')) : '' }}</font>
                  </div>
                  @endif
                  <div class="form-group col-md-4">
                    <label for="image">Image <font style="color:red;">*</font></label>
                    <input type="file" class="form-control form-control-sm" id="image" name="image">
                    <font style="color:red;">{{ ($errors->has('mname')) ? ($errors->first('mname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    @if(!empty(@$editData->image))
                    <img id="showImage" src="{{ asset('public/upload/employee_images/'. @$editData->image) }}" style="width:100px; height:110px; border:1px solid #000;" alt="">
                    @else
                    <img id="showImage" src="{{ asset('public/upload/No_image.png') }}" style="width:100px; height:110px; border:1px solid #000;" alt="">
                    @endif

                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)?'Update' : 'Submit' }}</button>
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
