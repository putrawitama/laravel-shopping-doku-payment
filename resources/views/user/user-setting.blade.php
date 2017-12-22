@extends('layouts.profile-master')

@section('profile-content')
<div class="col-md-12">

			<h1 style="margin-bottom:30px;">Setting</h1>
			<h2 style="margin-bottom:20px;">Update Password</h2>
			<form action=" {{ route('user.update-pass') }} " method="post">
				<div class="form-group">
					<label for="old-pass">Old Password</label>
					<input class="form-control" type="password" id="old-pass" name="old_pass">
				</div>
				<div class="form-group">
					<label for="new-pass">New Password</label>
					<input class="form-control" type="password" id="new-pass" name="new_pass">
				</div>
				<div class="form-group">
					<label for="verify-pass">Verify New Password</label>
					<input class="form-control" type="password" id="verify-pass" name="verify_pass">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" id="submit" name="submit" value="Update Password">
				</div>
				{{ csrf_field() }}
			</form>
		</div>
@endsection