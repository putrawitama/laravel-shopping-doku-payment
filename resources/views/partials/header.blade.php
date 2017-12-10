<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #EFDC05;">
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
</nav>

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