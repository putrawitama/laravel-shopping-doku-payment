@extends('layouts.master')

@section('styles')
<style type="text/css">
	@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
</style>
@endsection

@section('content')
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					<p> {{ $error }} </p>
				@endforeach
			</div>
		@endif
	<form class="form-signin my-5" action=" {{ route('user.signin') }} " method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        {{ csrf_field() }}
      </form>
	<!-- <div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Sign In</h1>

			@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p> {{ $error }} </p>
					@endforeach
				</div>
			@endif
			<form action=" {{ route('user.signin') }} " method="post">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" id="password" name="password">
				</div>
				<button type="submit" class="btn btn-primary">Sign In</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div> -->

	
@endsection