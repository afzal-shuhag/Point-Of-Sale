@extends('frontend.layouts.master')

@section('content')
  <div class="container margin-top-20">
    <div class="card card-body">
      <h2>Confirm Items</h2>
      <hr>
      <div class="row">
        <div class="col-md-7 border-right">
          @foreach(App\Cart::totalCarts() as $cart)
            <p>
              {{ $cart->eproduct->title }} -
              <strong> {{ $cart->eproduct->price }} Taka </strong>
              - {{ $cart->product_quantity }} items
            </p>
          @endforeach

        </div>
        <div class="col-md-5">
          @php
            $total_price = 0;
          @endphp
          @foreach(App\Cart::totalCarts() as $cart)
          @php
              $total_price += $cart->eproduct->price * $cart->product_quantity;
          @endphp
          @endforeach

          <p>Total Price : <strong>{{ $total_price }}</strong> Taka</p>

        </div>
      </div>
        <p>
          <a href="{{ route('carts') }}"> Change Cart Items</a>
        </p>
    </div>

    <div class="card card-body">
      <h2>Shiping Address</h2>
      <hr>
      <form method="POST" action="{{ route('checkouts.store') }}">
          @csrf

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciever Name') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>




          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

              <div class="col-md-6">
                  <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="" required autocomplete="phone_no">

                  @error('phone_no')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>



          <div class="form-group row">
              <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

              <div class="col-md-6">
                  <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" rows="4" required autocomplete="shipping_address"></textarea>

                  @error('shipping_address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message') }}</label>

              <div class="col-md-6">
                  <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="4"  autocomplete="message"></textarea>

                  @error('message')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

              <div class="col-md-6">
                <select class="form-control" name="payment_method_id" id="payments" required>
                  <option value="">Select a payment method</option>
                  @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                  @endforeach
                </select>

                @foreach($payments as $payment)

                  @if($payment->short_name == 'cash_on')
                      <div class="hidden alert alert-success mt-3" id="payment_{{ $payment->short_name }}">
                      <h3>
                        Thanks for ordering..... <br>
                        <small>Please pay your bill to our delivery man when you get your products</small>
                      </h3>
                    </div>
                  @else

                        <div class="hidden alert alert-success mt-3" id="payment_{{ $payment->short_name }}">
                          <h3>Payment Name : {{ $payment->name }}</h3> <br>
                          <p>
                            <strong>{{ $payment->name }} No : {{ $payment->no }}</strong> <br>
                            <strong>Account type : {{ $payment->type }}</strong>
                          </p>
                          <div class="">
                            Please Send Your Money to above Bkash Number and write your transaction id..
                          </div>

                        </div>


                  @endif

                @endforeach
                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
              </div>

          </div>
        </div>





          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Order Now') }}
                  </button>
              </div>
          </div>
      </form>

        <p>
          <a href="{{ route('carts') }}"> Change Cart Items</a>
        </p>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('#payments').change(function(){
      $payment_method = $("#payments").val();
      if($payment_method == 1)
      {
        $('#payment_cash_on').removeClass("hidden");
        $('#payment_bkash').addClass("hidden");
        $('#payment_rocket').addClass("hidden");
      }
      else if ($payment_method == 2)
      {
        $('#payment_bkash').removeClass("hidden");
        $('#payment_cash_on').addClass("hidden");
        $('#payment_rocket').addClass("hidden");
        $('#transaction_id').removeClass("hidden");
      }
      else if ($payment_method == 3)
      {
        $('#payment_rocket').removeClass("hidden");
        $('#payment_bkash').addClass("hidden");
        $('#payment_cash_on').addClass("hidden");
        $('#transaction_id').removeClass("hidden");
      }

   })
  </script>
@endsection
