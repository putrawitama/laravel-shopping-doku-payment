@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12" style="text-align: center; padding-top: 60px">
		<h1><strong>Succes !</strong></h1>
		<h4>Pembayaran anda telah berhasil</h4>
		<h5>Harap bersabar menunggu barang datang</h5>
		<img class="img-fluid" src="{{ asset('img/centang.png') }}" alt="Success Payment" style="margin-top: 30px; width: 20%">
		<br>
		<a href="" class="btn btn-success" style="margin: 30px 30px 30px 30px;"><h3>Done</h3></a>
	</div>
</div>
@endsection