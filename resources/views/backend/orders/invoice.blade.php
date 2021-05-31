<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invoice -- {{ $order->id }}</title>
    <link rel="stylesheet" href=" {{ asset('css/admin_style.css') }} ">
    <style media="screen">
      .invoice-header{
        padding: 10px 20px;
        background: burlywood;
        border-bottom: 1px solid;
      }
    </style>
  </head>
  <body>

      <div class="content-wrapper">
        <div class="invoice-header">
          <div class="float-left site-logo">
            <img src="{{ asset('images/favicon.png') }}" alt="">
          </div>
          <div class="float-right site-address">
            <h4>Ecommerce Shop</h4>
            <p>Address : <a href="#">Tilagor, 156, Sylhet</a> </p>
            <p>Phone : <a href="#">+880166836264</a> </p>
            <p>Email : <a href="#">demo@gmail.com</a> </p>
          </div>
          <div class="clearfix"></div>

        </div>
        <div class="invoice-description">
          <div class="invoice-left-top float-left">
            <p> <strong>Orderer Name : </strong> {{ $order->name }}</p>
            <p> <strong>Orderer Phone : </strong> {{ $order->phone_no }}</p>
            <p> <strong>Orderer Email : </strong> {{ $order->email }}</p>
            <p> <strong>Orderer shipping Address : </strong> {{ $order->shipping_address}}</p>
            <p> <strong>Orderer Name : </strong> {{ $order->name }}</p>
          </div>
          <div class="invoice-right-top float-right">
            <h3>Invoice - #{{ $order->id }}</h3>
            <p>{{ $order->created_at }}</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <h3>Products</h3>
            <hr>
            @if($order->carts->count() > 0)
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Product Title</th>
                  <th>Product Quantity</th>
                  <th>Unit Price</th>
                  <th>Sub Total Price</th>

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
                    <a href="#">{{ $cart->product->title }}</a>
                  </td>

                  <td>
                    {{ $cart->product_quantity }}
                </td>
                <td>{{ $cart->product->price }} Taka</td>

                @php
                  $total_price += $cart->product->price * $cart->product_quantity;
                @endphp

                <td>{{ $cart->product->price * $cart->product_quantity}} Taka</td>

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

            <hr>

          </div>


      </div>

  </body>
</html>
