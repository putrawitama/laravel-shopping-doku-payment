@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12" style="text-align: center; padding-top: 40px">
		<h1><strong>Failed !</strong></h1>
		<h4>Maaf pembayaran anda telah gagal</h4>
		<h5>Mohon lakukan kembali</h5>
		<img class="img-fluid" src="{{ asset('img/failed.png') }}" alt="Success Payment" style="margin-top: 30px; width: 25%">
		<br>
		<a href="{{route('product.index')}}" class="btn btn-danger" style="padding: 10px 40px 5px 40px; margin-top: 30px"><h3>Back!</h3></a>
	</div>
</div>

@endsection