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
              <h3>Edit Profile
                <a href="{{ route('profiles.view') }}" class="btn btn-success float-right"> <i class=""></i> Your Profile</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('profiles.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
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
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile</label>
                    <input type="mobile" class="form-control" id="mobile" name="mobile" value="{{$editData->mobile}}">
                    <font style="color:red;">{{ ($errors->has('mobile')) ? ($errors->first('mobile')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address" name="address" value="{{$editData->address}}">
                    <font style="color:red;">{{ ($errors->has('address')) ? ($errors->first('address')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="role">Gender</label>
                    <select class="form-control" name="gender">
                      <option value="">Select Gender</option>
                      <option value="Male" {{ ($editData->gender == "Male") ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ ($editData->gender == "Female") ? 'selected' : '' }}>Female</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('role')) ? ($errors->first('role')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                  </div>
                  <div class="form-group col-md-4">
                    <img id="showImage" src="{{ (!empty($user->image)) ? url('public/upload/user_images/' . $editData->image) : url('public/upload/' . 'No_image.png')}}" alt="" style="width:150px; height:160px; border: 1px solid #000;">
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
