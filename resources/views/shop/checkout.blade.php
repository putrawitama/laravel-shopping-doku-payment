@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your Total : ${{$total}}</h4>

            <form action="http://staging.doku.com/Suite/Receive" method="post">
                
            	<input name="MALLID" type="hidden" value="{{$mallid}}" >
	            <input name="BASKET" type="hidden" value="testing item,10000.00,1,10000.00" >
	            <input name="CHAINMERCHANT" type="hidden" value="NA" >
	            <input name="AMOUNT" type="hidden" value="{{$amount}}" >
	            <input name="PURCHASEAMOUNT" type="hidden" value="10000.00" >
	            <input name="TRANSIDMERCHANT" type="hidden" value="{{$tmerchant}}" >
	            <input name="WORDS" type="hidden" value="{{$WORDS}}" >
	            <input name="CURRENCY" type="hidden" value="360" >
	            <input name="PURCHASECURRENCY" type="hidden" value="360" >
	            <input name="COUNTRY" type="hidden" value="ID" >
	            <input name="SESSIONID" type="hidden" value="234asdf234" >
	            <input name="REQUESTDATETIME" type="hidden" value="20151212000000" >
	            <input name="NAME" type="hidden" value="Customer Name" >
	            <input name="EMAIL" type="hidden" value="customer@domain.com">
	             <input name="PAYMENTCHANNEL" type="hidden" value="15" >
	             <button>YE!</button>
            </form>
        </div>
    </div>
@endsection