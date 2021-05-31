<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
  <div class="container">

      <!-- <a class="navbar-brand" href="{{ route('frontend.index') }}"> <img src="{{ asset('images/logo.png') }}" alt=""> </a> -->
      <a class="navbar-brand" href="{{ route('frontend.index') }}"> <h1> <i>POS shop</i> </h1> </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mtc mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.index') }}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Contact</a>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" action="" method="get">
              <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary search_style" type="submit">Search</button>
                </div>
              </div>
            </form>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('carts') }}">
                <button class="btn btn-danger">
                  <span class="mt-1">Cart</span>
                  <span class="badge badge-warning">
                    {{ App\Cart::totalItems() }}
                  </span>
                </button>
              </a>
          </li>
        </ul>

      </div>
      </div>
    </nav>
    <!-- End of NavBar -->
