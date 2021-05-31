@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Other Cost</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Cost</li>
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
                Edit cost
              @else
                Add cost
              @endif
                <a href="{{ route('account.cost.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Other Cost List</a>
              </h3>

            </div><!-- /.card-header -->

            <div class="card-body">
              <form class="" action="{{ (@$editData)?route('account.cost.update',$editData->id):route('account.cost.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" id="date" name="date" value="{{ @$editData->date }}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Amount</label>
                    <input type="text" name="amount" value="{{ @$editData->amount }}" class="form-control">
                      <font style="color:red;">{{ ($errors->has('amount')) ? ($errors->first('amount')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <img src="{{ (!empty(@$editData->image))?url('public/upload/cost_images/'.@$editData->image):url('public/upload/No_image.png') }}" alt="" id="showImage" style="width:150px;height:90px; border:1px solid #000;">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" rows="4" class="form-control">{{@$editData->description}}</textarea>
                    <font style="color:red;">{{ ($errors->has('description')) ? ($errors->first('description')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-2"style="margin-top:30px;">
                    <button type="submit" class="btn btn-primary">{{ (@$editData)?'Update':'Submit' }}</button>
                  </div>
                </div>
              </form>
            </div>

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
