@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Notice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Notice</li>
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
                Edit Notice
                @else
                Add Notice
                @endif
                <a href="{{ route('notices.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Notice List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ (@$editData) ? route('notices.update',$editData->id) : route('notices.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name">Notice Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{@$editData->title}}">
                    <font style="color:red;">{{ ($errors->has('title')) ? ($errors->first('title')) : '' }}</font>
                  </div>
                  <div class="col-md-4">

                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Notice Description</label>
                    <textarea name="description" rows="8" cols="80" class="form-control">{{ @$editData->description }}</textarea>
                    <font style="color:red;">{{ ($errors->has('description')) ? ($errors->first('description')) : '' }}</font>
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
@endsection
