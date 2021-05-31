@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
              <h3>Add Product
                <a href="{{ route('eproducts.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Product List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('eproducts.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Title</label>
                    <input class="form-control" type="text" name="title" value="">
                    <font style="color:red;">{{ ($errors->has('title')) ? ($errors->first('title')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Price</label>
                    <input class="form-control" type="text" name="price" value="">
                    <font style="color:red;">{{ ($errors->has('price')) ? ($errors->first('price')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Description</label>
                    <input class="form-control" type="text" name="description" value="">
                    <font style="color:red;">{{ ($errors->has('description')) ? ($errors->first('description')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image">
                    <font style="color:red;">{{ ($errors->has('image')) ? ($errors->first('image')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                  ``  <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                    <font style="color:red;">{{ ($errors->has('category_id')) ? ($errors->first('category_id')) : '' }}</font>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
