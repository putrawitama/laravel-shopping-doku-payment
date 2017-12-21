@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    @foreach($products->chunk(3) as $dChunk)
        <div class="row" style="padding-top: 20px">
            @foreach($dChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="card" style="width:20rem;">
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