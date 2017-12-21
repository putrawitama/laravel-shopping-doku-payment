@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12" style="text-align: center; padding-top: 40px">
		<h1><strong>Succes !</strong></h1>
		<h4>Pembayaran anda telah berhasil</h4>
		<h5>Harap bersabar menunggu barang datang</h5>
		<img class="img-fluid" src="{{ asset('img/centang.png') }}" alt="Success Payment" style="margin-top: 30px; width: 25%">
		<br>
		<a href="" class="btn btn-success" style="padding: 10px 40px 5px 40px; margin-top: 30px"><h3>Done!</h3></a>
	</div>
</div>

@endsection