

@extends('frontend.layouts.master')

@section('content')
<!-- Start of Siderbar + content -->



  <div class="container margin-top-20">
    <div class="row">
      <div class="col-md-4">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:250px!important;">
          <div class="carousel-inner">
              <div class="product-item carousel-item active"  style="width:250px!important;">
                <img class="d-block w-100" src="{{ asset('public/upload/product_images/'.$product->image) }}" alt="First slide">
              </div>
            <!-- <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('images/products/1.png') }}" alt="First slide">
            </div> -->
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="mt-3">
          <p>Category : <span class="badge badge-primary">{{ $product->category->name }}</span></p>
        </div>
      </div>


      <div class="col-md-8">
          <div class="widget">
            <h3>{{ $product->title }}</h3>
            <h3>{{ $product->price }} Taka
              <span class="badge badge-primary">
                {{ $product->quantity<1 ? 'No Item is available' : $product->quantity.'items in stock' }}
              </span>
            </h3>
            <hr>
            <div class="product-description">
              {{ $product->description }}
            </div>
          </div>
          <div class="widget">

          </div>
      </div>
    </div>
  </div>

<!-- End of Siderbar + Content -->
@endsection
