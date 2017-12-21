<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #16a085;">
  <a class="navbar-brand" href="{{route('product.index')}}">L-Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <form class="col-9 offset-md-1">
      <div class="input-group">
        <form method="post" action="{{route('product.index')}}">
              <input name="keyword" type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-warning" type="button">Go!</button>
              </span>
        </form>
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
