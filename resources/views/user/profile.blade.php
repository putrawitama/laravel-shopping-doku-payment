@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-4 text-center" style="padding-top:80px;">
			<h1>User Profile</h1>
			<p class="text-left">Nama: {{ $fullname }}</p>
			<p class="text-left">Alamat: {{ $address }}</p>
			<p class="text-left">Kota: {{ $city }}</p>
			<p class="text-left">Provinsi: {{ $state }}</p>
			<p class="text-left">Negara: {{ $country }}</p>
			<p class="text-left">Kode pos: {{ $zipcode }}</p>
			<p class="text-left">Nomor telepon: {{ $phone }}</p>
			<p class="text-left">Tanggal lahir: {{ $birthdate }}</p>
		</div>
	</div>
@endsection