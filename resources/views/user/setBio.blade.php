@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>User Data</h1>

			@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p> {{ $error }} </p>
					@endforeach
				</div>
			@endif
			<form action=" {{ route('user.setbio') }} " method="post">
				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input class="form-control" type="text" id="fullname" name="fullname">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control" type="text" id="address" name="address">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input class="form-control" type="text" id="city" name="city">
				</div>
				<div class="form-group">
					<label for="state">State</label>
					<input class="form-control" type="text" id="state" name="state">
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<input class="form-control" type="text" id="country" name="country">
				</div>
				<div class="form-group">
					<label for="zipcode">Zipcode</label>
					<input class="form-control" type="text" id="zipcode" name="zipcode">
				</div>
				<div class="form-group">
					<label for="phone">Mobile Phone</label>
					<input class="form-control" type="text" id="phone" name="phone">
				</div>
				<div class="form-group">
					<label for="birthdate">Birthdate</label>
					<input class="form-control" type="date" id="birthdate" name="birthdate">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection