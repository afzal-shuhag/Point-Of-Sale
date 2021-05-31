@extends('backend.layouts.master')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  @section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          View Order #LE {{ $order->id }}
        </div>
        <div class="card-body">

          <h3>Order Information</h3>
          <div class="row">
            <div class="col-md-6 border-right">
              <p> <strong>Orderer Name : </strong> {{ $order->name }}</p>
              <p> <strong>Orderer Phone : </strong> {{ $order->phone_no }}</p>
              <p> <strong>Orderer Email : </strong> {{ $order->email }}</p>
              <p> <strong>Orderer shipping Address : </strong> {{ $order->shipping_address}}</p>
              <p> <strong>Orderer Name : </strong> {{ $order->name }}</p>
            </div>
            <div class="col-md-6">
              <p> <strong>Payment Method : </strong> {{ $order->payment->name }}</p>
              <p> <strong>Transaction ID : </strong> {{ $order->transaction_id }}</p>
            </div>
          </div>
          <hr>
          <h3>Ordered Items</h3>
          @if($order->carts->count() > 0)
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

              @foreach($order->carts as $cart)

              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                  <a href="{{ route('frontend.product.details', $cart->eproduct->id) }}">{{ $cart->eproduct->title }}</a>
                </td>
                <td>

                    <img src="{{ asset('public/upload/product_images/'. $cart->eproduct->image ) }}" alt="" width="50px">

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
              <tr>
                <td colspan="4"></td>
                <td>Shipping Charge : </td>
                <td colspan="2"> <strong> {{ $order->shipping_charge }} Taka</strong></td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td>Custom Discount : </td>
                <td colspan="2"> <strong> {{ $order->custom_discount }} Taka</strong></td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td>Total Amount : </td>
                <td colspan="2"> <strong> {{ $total_price + $order->shipping_charge - $order->custom_discount }} Taka</strong></td>
              </tr>

            </tbody>
          </table>
          @endif



          <div class="card">
            <div class="card-body">
              <form class="form-row" action="{{ route('admin.order.charge', $order->id) }}" method="post">
                @csrf
                  <label>Shipping Charge</label>
                 <input class="form-control" type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
                 <br>
                   <label>Custom Discount</label>
                  <input class="form-control" type="number" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}">
                     <br>
                  <input type="submit" name="" value="Update" class="btn btn-success">
                  <a href="{{ route('admin.order.invoice', $order->id) }}" class="ml-2 btn btn-info" >Generate Invoice </a>

              </form>


          <hr>

              <form class="form-row" action="{{ route('admin.order.completed', $order->id) }}" method="post" style="display : inline-block!important">
                @csrf
                @if($order->is_completed)
                 <input type="submit" name="" value="Cancel Order" class="btn btn-danger form-control">
                @else
                 <input type="submit" name="" value="Complete Order" class="btn btn-success form-control">
                @endif
              </form>
            </div>
          </div>

          <form class="form-row" action="{{ route('admin.order.paid', $order->id) }}" method="post"  style="display : inline-block!important">
            @csrf
            @if($order->is_paid)
             <input type="submit" name="" value="Cancel Payment" class="btn btn-danger form-control">
            @else
             <input type="submit" name="" value="Complete Payment" class="btn btn-success form-control">
            @endif
          </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endsection
