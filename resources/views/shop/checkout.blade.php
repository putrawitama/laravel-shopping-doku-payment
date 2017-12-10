@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="row my-3">
    	<div class="col">
    		<div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Checkout</h4>
			    <p class="card-text">Your Total : Rp {{ number_format($total,0,".",".") }}</p>
			    <form action="http://staging.doku.com/Suite/Receive" method="post">
	            	<input name="MALLID" type="hidden" value="{{ $mallid }}" >
		            <input name="BASKET" type="hidden" value="{{ $basket }}" >
		            <input name="CHAINMERCHANT" type="hidden" value="NA" >
		            <input name="AMOUNT" type="hidden" value="{{$amount}}" >
		            <input name="PURCHASEAMOUNT" type="hidden" value="{{$amount}}" >
		            <input name="TRANSIDMERCHANT" type="hidden" value="{{$tmerchant}}" >
		            <input name="WORDS" type="hidden" value="{{$WORDS}}" >
		            <input name="CURRENCY" type="hidden" value="360" >
		            <input name="PURCHASECURRENCY" type="hidden" value="360" >
		            <input name="COUNTRY" type="hidden" value="ID" >
		            <input name="SESSIONID" type="hidden" value="12345" >
		            <input name="REQUESTDATETIME" type="hidden" value="{{ \Carbon\Carbon::now()->format('YmdHis') }}" >
		            <input name="NAME" type="hidden" value="Putra Witama" >
		            <input name="EMAIL" type="hidden" value="putrawitama@gmail.com">
		            <div class="form-group">
					    <label for="PAYMENTCHANNEL">Payment Method</label>
					    <select class="form-control" name="PAYMENTCHANNEL">
					      <option value="15">Credit Card</option>
					      <option value="04">Doku Wallet</option>
					      <option value="02">Mandiri ClickPay</option>
					      <option value="18">KlikPay BCA</option>
					      <option value="06">BRI e-Pay</option>
					    </select>
					  </div>
		            <button class="btn btn-primary">Pay</button>
	            </form>
			  </div>
			</div>
    	</div>
    </div>
@endsection