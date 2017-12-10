@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    <div class="row" style="padding-top: 70px">
        <div class="col-md-6">
            <!-- carousel -->
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/ah.jpg') }}" alt="Los Angeles" width="100%" height="250">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>   
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/hamjah.jpg') }}" alt="Chicago" width="100%" height="250">
                        <div class="carousel-caption">
                            <h3>Chicago</h3>
                            <p>Thank you, Chicago!</p>
                        </div>   
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/setnov.jpg') }}" alt="New York" width="100%" height="250">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
                        </div>   
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        <!-- card promo -->
        <div class="col-md-6">
            <p>Promo</p>
            <div class="card bg-primary text-white">
                <div class="card-body">Primary card</div>
            </div>
            <br>
            <div class="card bg-success text-white">
                <div class="card-body">Success card</div>
            </div>
        </div>
    </div>

    @foreach($products->chunk(3) as $dChunk)
        <div class="row" style="padding-top: 20px">
            @foreach($dChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="card" style="width:250px;">
                        <img class="card-img-top img-responsive img-thumbnail rounded mx-auto d-block" src="{{ $product->imagePath }}" alt="Produk Image" style="width:80%">
                        <div class="card-body">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">Rp {{ $product->price }}</div>
                                <a href=" {{route('product.addToCart', ['id' => $product->id])}} " class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <!-- <div class="card" style="width:350px">
                    <img class="card-img-top" src="{{ asset('img/fatur.jpg') }}" alt="Produk Image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">Add to cart</a>
                    </div>
                </div> -->

    <!-- gone fatur
    @foreach($products->chunk(3) as $dChunk)
        <div class="row">
            @foreach($dChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">Rp {{ $product->price }}</div>
                                <a href=" {{route('product.addToCart', ['id' => $product->id])}} " class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach -->
@endsection