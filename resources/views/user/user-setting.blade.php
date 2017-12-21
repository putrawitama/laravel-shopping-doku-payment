@extends('layouts.profile-master')

@section('profile-content')
<div class="col-md-12">

			<h1 class="">Setting</h1>
			<form action=" {{ route('user.setbio') }} " method="post">
				
			</form>
		</div>
@endsection