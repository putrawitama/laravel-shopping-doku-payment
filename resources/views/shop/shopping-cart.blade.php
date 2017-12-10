@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="container" style="padding-top: 80px">
            <div class="card shopping-cart">
                <div class="card-header text-light" style="background-color: #e89e30">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shopping cart
                    <a href="{{route('product.index')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <!-- PRODUCT -->
                    @foreach($products as $product)
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong>{{ $product['item']['title'] }}</strong></h4>
                                <h4>
                                    <small>Product description</small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong>{{$product['price']}} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="number" step="1" max="99" min="1" value="{{ $product['qty'] }}" title="Qty" class="qty" size="4">
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <!-- END PRODUCT -->
                    <div class="pull-right">
                        <a href="" class="btn btn-outline-secondary pull-right">
                            Update shopping cart
                        </a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <a href="{{route('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b>{{$totalPrice}}</b>
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