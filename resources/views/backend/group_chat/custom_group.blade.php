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
          <form class="" action="{{ route('chat.individual') }}" method="GET">
            <li class="nav-item d-none d-sm-inline-block mt-5">
              <p class="badge badge-primary">My Groups --> </p>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <select class="form-control form-sm" name="group_name">
                <option value="">Select Group</option>
                @foreach($groups as $group)
                  <option value="{{ $group->name }}">{{ $group->name }}</option>
                @endforeach
              </select>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <button type="submit" class="btn btn-sm btn-success" style="margin-bottom: 7px;">Inbox</button>
            </li>
          </form>

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
              <h3>{{ $group_name }}
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pt-4 rounded">
				<!-- <ul class="p-0">
					<li>
						<div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
						    	<img id="profile-photo" src="http://nicesnippets.com/demo/man01.png" class="rounded-circle" />
							</div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4 class="m-0"><a href="#">Jacks David</a></h4>
							    <time class="text-white ml-3">1 hours ago</time>
							    <like></like>
							    <p class="mb-0 text-white">Thank you for visiting all the way from New York.</p>
							</div>
						</div>
					</li>
					<ul class="p-0">
						<li>
							<div class="row comments mb-2">
								<div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
							    	<img id="profile-photo" src="http://nicesnippets.com/demo/man02.png" class="rounded-circle" />
								</div>
								<div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
									<h4 class="m-0"><a href="#">Steve Alex</a></h4>
								    <time class="text-white ml-3">1 week ago</time>
								    <like></like>
								    <p class="mb-0 text-white">Thank you for visiting all the way from NYC.</p>
								</div>
							</div>
						</li>
					</ul>
				</ul>
				<ul class="p-0">
					<li>
						<div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
						    	<img id="profile-photo" src="http://nicesnippets.com/demo/man03.png" class="rounded-circle" />
							</div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4 class="m-0"><a href="#">Andrew Filander</a></h4>
							    <time class="text-white ml-3">7 day ago</time>
							    <like></like>
							    <p class="mb-0 text-white">Thank you for visiting all the way from New York.</p>
							</div>
						</div>
					</li>
					<ul class="p-0">
						<li>
							<div class="row comments mb-2">
								<div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
							    	<img id="profile-photo" src="http://nicesnippets.com/demo/man04.png" class="rounded-circle" />
								</div>
								<div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
									<h4 class="m-0"><a href="#">james Cordon</a></h4>
								    <time class="text-white ml-3">1 min ago</time>
								    <like></like>
								    <p class="mb-0 text-white">Thank you for visiting from an unknown location.</p>
								</div>
							</div>
						</li>
					</ul>
				</ul> -->
        @foreach($messages as $message)
				<ul class="p-0">
					<li>
						<div class="row comments mb-2" >
              @if(Auth::user()->id == $message->user_id)
              <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                  <!-- <img id="profile-photo" src="url('public/upload/user_images/' . $message->user->image)" class="rounded-circle" /> -->
                  <img id="profile-photo" class="rounded-circle profile-user-img img-fluid img-circle"
                       src="{{ (!empty($message->user->image)) ? url('public/upload/user_images/' . $message->user->image) : url('public/upload/' . 'No_image.png')}}"
                       alt="User profile picture">
              </div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2" style="{{ (Auth::user()->id == $message->user_id) ? 'background:#138496' : '' }}">
								<h4 class="m-0"><a href="#">{{ $message->user->name }}</a></h4>
							    <time class="text-white ml-3">{{ date('M Y H:m',strtotime($message->created_at)) }}</time>
							    <like></like>
							    <p class="mb-0 text-white">{{ $message->text }}</p>
							</div>
              @else
              <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2" style="{{ (Auth::user()->id == $message->user_id) ? 'background:#138496' : '' }}">
								<h4 class="m-0"><a href="#">{{ $message->user->name }}</a></h4>
							    <time class="text-white ml-3">{{ date('M Y H:m',strtotime($message->created_at)) }}</time>
							    <like></like>
							    <p class="mb-0 text-white">{{ $message->text }}</p>
							</div>
              <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                  <!-- <img id="profile-photo" src="url('public/upload/user_images/' . $message->user->image)" class="rounded-circle" /> -->
                  <img id="profile-photo" class="rounded-circle profile-user-img img-fluid img-circle"
                       src="{{ (!empty($message->user->image)) ? url('public/upload/user_images/' . $message->user->image) : url('public/upload/' . 'No_image.png')}}"
                       alt="User profile picture">
              </div>
              @endif
						</div>
					</li>
				</ul>
        @endforeach

				<div class="row comment-box-main p-3 rounded-bottom" style="background:#A8A8A8;margin-right: 20px;">
			  		<div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
            <form class="" action="{{ route('group.chat.store') }}" method="post">
              @csrf
              <input type="hidden" name="name" value="{{ $group_name }}">
              <input type="text" name="text" class="form-control" placeholder="enter text...." />
              </div>
              <div class="col-md-3 col-sm-2 col-2 pl-0 text-center send-btn">
                <button type="submit" class="btn btn-success">Send</button>
              </div>
            </form>
				</div>
			</div>
		</div>
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
