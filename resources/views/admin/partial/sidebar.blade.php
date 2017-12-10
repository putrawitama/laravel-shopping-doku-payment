<!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
          </div>
          <div class="sidenav-header-logo"><a href="admin-home.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">OK</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active"><a href="{{ route('user.admin') }}"> <i class="fa fa-home"></i><span>Home</span></a></li>
            <li> <a href="admin-user.html"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
            <li> <a href="admin-order.html"><i class="icon-presentation"></i><span>Order</span></a></li>
          </ul>
        </div>
        <div class="admin-menu">
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
          <li> <a href="{{ route('user.admin.create') }}">Manage Product</a></li>
          <li> <a href="{{ route('user.admin.product.view') }}">Product Lists</a></li>
          </ul>
        </div>
      </div>
    </nav>