<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #16a085;">
  <a class="navbar-brand" href="{{route('product.index')}}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <form class="col-9 offset-md-1">
      <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-warning" type="button">Go!</button>
          </span>
        </div>
    </form>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="{{route('product.shoppingCart')}}" class="nav-link">
                <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:20px;"></i>
                <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
            </a>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true" style="font-size:20px;"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::check())
            <a class="dropdown-item" href="{{route('user.profile')}} ">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('user.logout')}} ">Logout</a>
          @else
            <a class="dropdown-item" href="{{route('user.signup')}} ">Sign Up</a>
            <a class="dropdown-item" href="{{route('user.signin')}} ">Sign In</a>
          @endif
        </div>
      </li>
      
    </ul>
  </div>
</nav>

<!-- <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #EFDC05;">
    <a class="navbar-brand" href="{{route('product.index')}}">
        <img src="{{ asset('img/logo.png') }}" width="140" height="30" class="d-inline-block align-top" alt="Brand">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-auto px-auto my-lg-0" role="search">
            <div class="input-group" style="height: 40px;">
                <input class="form-control mr-sm-0" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-addon">
                    <button type="submit" class="btn btn-link"><i class="fa fa-search" aria-hidden="true" style="font-size: 25px; color: grey"></i></button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-3">
            <li class="nav-item ml-2">
                <a href="{{route('product.shoppingCart')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:30px;color: #d35400;"></i>
                    <span class="badge badge-dark">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </li>
        </ul>
        
        <ul class="navbar-nav ml-2">
            @if(Auth::check())
                <li class="nav-item ml-3">
                    <a href="{{route('user.profile')}}" class="nav-link" style="color: grey">Profile</a>
                </li>
                <li class="nav-item ml-3">
                    <a href="{{route('user.logout')}}" class="btn btn-primary ml-3">Logout</a>
                </li>
            @else
                <li class="nav-item ml-3">
                    <a href="{{route('user.signup')}}" class="nav-link" style="color: grey">Daftar</a>
                </li>
                <li class="nav-item ml-3">
                    <a href="{{route('user.signin')}}" class="btn btn-primary ml-3">Login</a>
                </li>
            @endif
        </ul>
        
    </div>
</nav> -->

<!-- gone fatur -->
<!-- <nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('product.index')}}">Brand</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route('product.shoppingCart')}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{route('user.profile')}} ">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.logout')}} ">Logout</a></li>
                        @else
                            <li><a href="{{route('user.signup')}} ">Sign Up</a></li>
                            <li><a href="{{route('user.signin')}} ">Sign In</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> -->