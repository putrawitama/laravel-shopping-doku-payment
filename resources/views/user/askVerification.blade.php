@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3 text-center" style="padding-top:80px;">
			<h1>Anda telah berhasil tedaftar!</h1>
			<p>Kami telah mengirimkan email verifikasi ke email anda. Silakan untuk mengecek inbox anda. Jika email belum terkirim, isikan email anda di bawah ini untuk mengirim ulang email verifikasi.</p>
			<form action=" {{ route('user.resendVerificationToken') }} " method="post">
				<div class="form-group">
					<input class="form-control" type="email" id="email" name="email" placeholder="Email">
				</div>
				<button type="submit" class="btn btn-primary">Kirim ulang email verifikasi</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection