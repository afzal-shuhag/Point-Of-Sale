@extends('backend.layouts.master')
<style media="screen">
body{
font-family: 'Raleway', sans-serif;
background: #E9ECE9;
}
.comments-main{
background: #FFF;
}
.comment time, .comment:hover time,.icon-rocknroll, .like-count {
-webkit-transition: .25s opacity linear;
transition: .25s opacity linear;
}
.comments-main ul li{
list-style: none;
}
.comments .comment {
padding: 5px 10px;
background: #00AF90;
}
.comments .comment:hover time{
opacity: 1;
}
.comments .user-img img {
width: 50px;
height: 50px;
}
.comments .comment h4 {
display: inline-block;
font-size: 16px;
}
.comments .comment h4 a {
color: #404040;
text-decoration: none;
}
.comments .comment .icon-rocknroll {
color: #545454;
font-size: .85rem;
}
.comments .comment .icon-rocknroll:hover {
opacity: .5;
}
.comments .comment time,.comments .comment .like-count,.comments .comment .icon-rocknroll {
font-size: .75rem;
opacity: 0;
}
.comments .comment time, .comments .comment .like-count {
font-weight: 300;
}
.comments .comment p {
font-size: 13px;
}
.comments .comment p .reply {
color: #BFBFA8;
cursor: pointer;
}
.comments .comment .active {
opacity: 1;
}
.icon-rocknroll {
background: none;
outline: none;
cursor: pointer;
margin: 0 .125rem 0 0;
}
.comments .comment:hover .icon-rocknroll,.comments .comment:hover .like-count {
opacity: 1;
}
.comment-box-main{
background: #CA1D5F;
}
@media (min-width: 320px) and (max-width: 480px){
.comments .comment h4 {
  font-size: 12px;
}
.comments .comment p{
  font-size: 11px;
}
.comment-box-main .send-btn button{
  margin-left: 5px;
}
}
</style>
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Messenger</h1>
          <li class="nav-item d-none d-sm-inline-block mt-5">
            <a href="{{ route('group.chat.add') }}" class="nav-link btn btn-sm btn-info">Create a Group</a>
          </li>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
              <h3>Add User (5 max one time)
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <form class="" action="{{ route('group.chat.create') }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">Group Name</label>
                      <input type="text" name="name" class="form-control">
                      <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Select User</label>
                      <select class="form-control" name="user_id[]" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                      ``  <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('user_id')) ? ($errors->first('user_id')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Select User</label>
                      <select class="form-control" name="user_id[]" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                      ``  <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('user_id')) ? ($errors->first('user_id')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Select User</label>
                      <select class="form-control" name="user_id[]" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                      ``  <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('user_id')) ? ($errors->first('user_id')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Select User</label>
                      <select class="form-control" name="user_id[]" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                      ``  <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('user_id')) ? ($errors->first('user_id')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Select User</label>
                      <select class="form-control" name="user_id[]" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                      ``  <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                      <font style="color:red;">{{ ($errors->has('user_id')) ? ($errors->first('user_id')) : '' }}</font>
                    </div>
                    <div class="form-group col-md-2" style="margin-top:30px;">
                      <button type="submit" name="button" class="btn btn-success">Add Users</button>
                    </div>
                  </div>
                </form>
	             </div>
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
