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
              <h3>Edit Product
                <a href="{{ route('products.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Product List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('products.update', $editData->id) }}" id="myForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Supplier Name</label>
                  <select class="form-control" name="supplier_id">
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                  ``  <option value="{{ $supplier->id }}" {{ $editData->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                  </select>
                    <font style="color:red;">{{ ($errors->has('supplier_id')) ? ($errors->first('supplier_id')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $editData->name }}">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Unit Name</label>
                  <select class="form-control" name="unit_id">
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                  ``  <option value="{{ $unit->id }}" {{ $editData->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                    @endforeach
                  </select>
                    <font style="color:red;">{{ ($errors->has('unit_id')) ? ($errors->first('unit_id')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                  ``  <option value="{{ $category->id }}" {{ $editData->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
