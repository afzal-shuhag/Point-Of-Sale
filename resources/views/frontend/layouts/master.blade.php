<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      @yield('title','Ecommerce Project')
    </title>
    @include('frontend.partials.styles')
  </head>
  <body>

    <div class="wrapper">
          @include('frontend.partials.nav')
          @include('frontend.partials.messages')
          @yield('content')

          @include('frontend.partials.footer')

    </div>

    @include('frontend.partials.scripts')
    @yield('scripts')
  </body>
</html>
