@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="container" style="padding-top: 80px">
            <div class="card shopping-cart">
                <div class="card-header">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shopping cart
                    <a href="{{route('product.index')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <!-- PRODUCT -->
                    @foreach($products as $product)
                        <div class="row">
                            <div class="col-1">
                                <img class="img-thumbnail" src="{{ $product['item']['imagePath'] }}" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-9">
                                <h4 class="product-name"><strong>{{ $product['item']['title'] }}</strong></h4>
                                <h4>
                                    <small>Product description</small>
                                </h4>
                            </div>
                            <div class="col">
                                 <h6><strong>Rp {{$product['price']}} <span class="text-muted">x</span> {{ $product['qty'] }}</strong></h6>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <!-- END PRODUCT -->
                    <div class="pull-right">
                        <button type="button" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i> Empty Cart
                        </button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <a href="{{route('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b>Rp {{$totalPrice}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- gone fathur -->
        <!-- <div class="row" style="padding-top: 80px;">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">{{$product['price']}}</span>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toogle" data-toogle="dropdown" >
                                    Action
                                    <span class="caret"></span>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Reduce by 1</a></li>
                                        <li><a href="#">Reduce All</a></li>
                                    </ul>
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div> -->
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection