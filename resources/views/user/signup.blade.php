@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Sign Up</h1>

			@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p> {{ $error }} </p>
					@endforeach
				</div>
			@endif
			<form action=" {{ route('user.signup') }} " method="post">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" id="password" name="password">
				</div>
				<div class="form-group">
					<label for="password-verify">Password Verification</label>
					<input class="form-control" type="password" id="password-verify" name="password_verify">
				</div>
				<div class="form-group text-center">
					<img id="captcha" src="{{ Captcha::url() }}" alt="">
					<a id="refresh-captcha" class="btn btn-default" href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" id="captcha" name="captcha">
				</div>
				<button type="submit" class="btn btn-primary">Sign Up</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection

@section('scripts')
<script>
$(function(){
	$('#refresh-captcha').click(function(){
		var url = $('#captcha').attr('src') + Math.floor((Math.random() * 100) + 1);
		$('#captcha').attr('src', url);
	});
})
</script>
@endsection