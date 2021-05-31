@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<?php
  $count =  App\Model\Notice::where('status','0')->get();
  foreach ($count as $key => $data) {
    $data->status = '1';
    $data->save();
  }
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a class="m-0 badge badge-success" href="{{ route('notices.add') }}">Add Notice</a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Notices</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="container">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <h2 class="text-center" style="background:skyblue;padding:3px;border-radius:5px;">List of Notices</h2>
      </div>
      <div class="col-md-4">

      </div>
    </div>

    @foreach($allData as $key => $value)
    <div class="card">
      <div class="card-header">{{ $value->title }}</div>
      <div class="card-body">
        <p>{{ $value->description }}</p>
      </div>
      <div class="card-footer">
        <strong>Notice given by :</strong> <span class="badge badge-primary">{{ $value->user->name }}</span>
        <strong>Date :</strong> <span class="badge badge-primary">{{ date('d-m-Y',strtotime($value->created_at)) }}</span>
        @if($value->created_by == Auth::user()->id)
          <span class="ml-5"> <a window.confirm("sometext"); href="{{ route('notices.delete',$value->id) }}">Delete</a> </span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
