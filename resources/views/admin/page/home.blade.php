@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
  <!-- Count -->
  <section class="dashboard-counts section-padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="icon"><i class="fa fa-user-o"></i></div>
            <div class="name"><strong class="text-uppercase">Users</strong><span>Listed User</span>
              <div class="count-number">9999</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="icon"><i class="fa fa-dollar"></i></div>
            <div class="name"><strong class="text-uppercase">Orders</strong><span>Listed Order</span>
              <div class="count-number">9999</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="icon"><i class="fa fa-database"></i></div>
            <div class="name"><strong class="text-uppercase">Products</strong><span>Listed Product</span>
              <div class="count-number">9999</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Chart -->
    <section class="dashboard-header section-padding">
      <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">
          <!-- Line Chart -->
          <div class="col-lg-6 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="wrapper sales-report">
              <h2 class="display h4">Report Penjualan</h2>
              <p> Chart Penjualan </p>
              <div class="line-chart">
                <canvas id="lineCahrt"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      @foreach($products->chunk(3) as $dChunk)
  <div class="container card" >  
      <div class="card-body"> 
          <div class="row" style="margin-left: 10px">
              <div>
                <h2 class="display h4">Listed Product</h2>
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Book Cover</th>
                              <th>Book Title</th>
                              <th>Descripton</th>
                              <th>Price</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($dChunk as $product)
                          <tr>
                              <td><img src="{{ $product->imagePath }}" class="img-thumbnail" alt="Cinque Terre" width="136" height="36"> </td>
                              <td>{{ $product->title }}</td>
                              <td>{{ $product->description }}</td>
                              <td>Rp {{ $product->price }}</td>
                          </tr>
                      @endforeach
                      </tbody> 
                  </table>
              </div>
          </div>
      </div>
  </div>
  @endforeach
    </section>
    <!-- Statistics Section-->
    <section class="statistics section-padding section-no-padding-bottom">
      <div class="container-fluid">
      </div>
    </section>
    <!-- Updates Section -->
    <section class="updates section-padding">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-12">
              </div>
            </div>
          </div>
    </section>
@endsection