@extends('layouts.profile-master')

@section('profile-content')
<div class="col-md-12">

			<h1 class="">Edit Profile</h1>

			<div class="row" style="padding-top:20px;padding-bottom:20px;">
				<div class="col-md-2 text-center">
					<img src="
					@if(Auth::user()->image == null)
					{{ asset('img/user_profile/default.jpg') }}
					@else
					{{ Auth::user()->image }}
					@endif
					" alt="" class="img img-fluid rounded" style="width:80px;">
				</div>
				<div class="col-md-10">
					<div class="row">
						<form action="{{ route('user.update-profile-picture') }}" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<input class="btn btn-link" type="file" name="file" style="color:#333;">
							</div>
							{{ csrf_field() }}
						<div class="col-md-12">
							<input class="btn btn-link" type="submit" name="submit" value="Add/Update Picture" style="color:#333;">
						</form>
							<a href="{{ route('user.remove-picture') }}" class="btn btn-link">Remove Picture</a>
						</div>
					</div>
				</div>
			</div>
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
					<input class="form-control" type="text" id="fullname" name="fullname" value="{{ $fullname }}">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control" type="text" id="address" name="address" value="{{ $address }}">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input class="form-control" type="text" id="city" name="city" value="{{ $city }}">
				</div>
				<div class="form-group">
					<label for="state">State</label>
					<input class="form-control" type="text" id="state" name="state" value="{{ $state }}">
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<input class="form-control" type="text" id="country" name="country" value="{{ $country }}">
				</div>
				<div class="form-group">
					<label for="zipcode">Zipcode</label>
					<input class="form-control" type="text" id="zipcode" name="zipcode" value="{{ $zipcode }}">
				</div>
				<div class="form-group">
					<label for="phone">Mobile Phone</label>
					<input class="form-control" type="text" id="phone" name="phone" value="{{ $phone }}">
				</div>
				<div class="form-group">
					<label for="birthdate">Birthdate</label>
					<input class="form-control" type="date" id="birthdate" name="birthdate" value="{{ $birthdate }}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
@endsection