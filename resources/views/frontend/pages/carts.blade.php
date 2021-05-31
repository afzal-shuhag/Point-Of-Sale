<!-- if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
} -->

@extends('frontend.layouts.master')

@section('content')
  <div class="container margin-top-20 mb-5">
    <h2>My Cart Items</h2>
    @if(App\Cart::totalItems() > 0)
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Product Title</th>
          <th>Product Image</th>
          <th>Product Quantity</th>
          <th>Unit Price</th>
          <th>Sub Total Price</th>
          <th>
            Delete
          </th>
        </tr>
      </thead>
      <tbody>

        @php
          $total_price = 0;
        @endphp

        @foreach(App\Cart::totalCarts() as $cart)

        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>
            <a href="{{ route('frontend.product.details', $cart->eproduct->id) }}">{{ $cart->eproduct->title }}</a>
          </td>
          <td>
             @if($cart->eproduct->image != null)
              <img src="{{ asset('public/upload/eproduct_images/'. $cart->eproduct->image ) }}" alt="" width="50px">
             @endif
          </td>

          <td>
            <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
            @csrf
            <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
            <button type="submit" class="btn btn-success ml-2">Update</button>
          </form>
        </td>
        <td>{{ $cart->eproduct->price }} Taka</td>

        @php
          $total_price += $cart->eproduct->price * $cart->product_quantity;
        @endphp

        <td>{{ $cart->eproduct->price * $cart->product_quantity}} Taka</td>
        <td>
          <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
          @csrf
          <input type="hidden" name="cart_id" class="form-control">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="4"></td>
          <td>Total Amount : </td>
          <td colspan="2"> <strong> {{ $total_price }} Taka</strong></td>
        </tr>

      </tbody>
    </table>
    <div class="float-right mb-5">
      <a href="{{ route('frontend.index') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
      <a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg">Checkout</a>
    </div>
    <div class="clearfix">

    </div>
    @else
      <div class="alert alert-warning">
        <h2>There is no items in your Cart</h2> <br>
        <a href="{{ route('frontend.index') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
      </div>
    @endif

  </div>
@endsection
