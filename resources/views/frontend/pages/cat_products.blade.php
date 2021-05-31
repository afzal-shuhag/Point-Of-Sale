@extends('frontend.layouts.master')

@section('content')
<!-- Start of Siderbar + content -->

<div class="our-slider mb-5">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item mt-3 mb-3">
      <img class="d-block w-100" src="{{ asset('images/sliders/1601502521.jpg') }}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h4>Slider</h4>
        <p>
            <a href="" target="_blank" class="btn btn-danger">Button Text</a>
        </p>
      </div>
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


  <div class="container margin-top-20">

    <div class="row">
      <div class="col-md-4">
        @include('frontend.partials.product-sidebar')
      </div>

      <div class="col-md-8">
        @php
          $cat_name = App\Ecategory::where('id',$products[0]->category_id)->first()->name;
        @endphp
        <div class="widget">
            <h3>All Products <span class="badge badge-primary">{{ $cat_name }}</span> </h3>

            <div class="row">

              @foreach($products as $product)

              @if($product == null)
                <h2 class="badge badge-danger">No Products in this category</h2>
              @else
              <div class="col-md-4">
                <div class="card">
                  <!-- <img class="card-img-top feature-img" src="{{ asset('images/products/'.'samsung.png') }}" alt="Card image"> -->
                    <a href="">
                      <img style ="  min-height: 200px;" class="card-img-top feature-img product_image" src="{{ asset('public/upload/product_images/'.$product->image) }}" alt="Card image">
                    </a>
                  <div class="card-body">
                    <h4 class="card-title">
                       <a href="{{ route('frontend.product.details',$product->id) }}">{{ $product->title }}</a>
                     </h4>
                    <p class="card-text">{{ $product->price }}</p>
                    <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <button type="submit" class="btn btn-warning" name="button">Add To Cart</button>
                    </form>
                    <!-- <a href="#" class="btn btn-outline-warning">Add To Cart</a> -->
                  </div>
                </div>
              </div>
              @endif

              @endforeach


            </div>

            <div class="pagination">

            </div>
          </div>
      </div>
    </div>
  </div>

<!-- End of Siderbar + Content -->
@endsection
