<!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="logo.png" alt="brand" class="img-fluid rounded-circle">
          </div>
          <div class="sidenav-header-logo"><a href="{{ route('user.admin.home') }}" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">OK</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active"><a href="{{ route('user.admin.home') }}"> <i class="fa fa-home"></i><span>Home</span></a></li>
            <li> <a href="{{ route('user.admin.users') }}"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
            <li> <a href="{{ route('user.admin.orders') }}"><i class="fa fa-dollar"></i><span>Order</span></a></li>
            <li> <a href="{{ route('user.admin.create') }}"><i class="fa fa-exchange"></i><span>Manage Product</span></a></li>
            <li> <a href="{{ route('user.admin.product.view') }}"><i class="fa fa-database"></i><span>Product List</span></a></li>
          </ul>
        </div>
      </div>
    </nav>