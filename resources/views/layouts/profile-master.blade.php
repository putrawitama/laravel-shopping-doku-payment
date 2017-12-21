@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="sidebar-base col-md-3">
			<div class="row text-center">
				<div class="profile-image col-md-12">
					<img src="
					@if(Auth::user()->image == null)
					{{ asset('img/user_profile/default.jpg') }}
					@else
					{{ Auth::user()->image }}
					@endif
					" alt="" class="img img-fluid rounded-circle">
				</div>
				<div class="col-md-12">
					<h2>{{ Auth::user()->fullname }}</h2>
					<p>Joined at {{ date('F Y', strtotime(Auth::user()->created_at)) }}</p>
				</div>
			</div>
			<style>
				.profile-image{
					padding-top: 30px;
					padding-bottom: 30px;
				}

				.sidebar-button{
					padding-top: 15px;
					padding-bottom: 15px;
					font-size: 16px;
				}

				.sidebar-button:hover{
					cursor: pointer;
				}
				a{
					color: #333 !important;
				}
			</style>
			<div class="row">
				<div class="sidebar-button col-md-12">
					<a href="{{ route('user.profile') }}">
						<div class="row">
							<div class="col-md-2">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								Profile
							</div>
						</div>
					</a>
				</div>
				<div class="sidebar-button col-md-12">
					<a href="{{ route('user.edit-profile') }}">
						<div class="row">
							<div class="col-md-2">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								Edit Profile
							</div>
						</div>
					</a>
				</div>
				<div class="sidebar-button col-md-12">
					<a href="{{ route('user.transactions') }}">
						<div class="row">
							<div class="col-md-2">
								<i class="fa fa-credit-card" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								Transactions
							</div>
						</div>
					</a>
				</div>
				<div class="sidebar-button col-md-12">
					<a href="{{ route('user.setting') }}">
						<div class="row">
							<div class="col-md-2">
								<i class="fa fa-wrench" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								Setting
							</div>
						</div>
					</a>
				</div>
				<div class="sidebar-button col-md-12">
					<a href="{{ route('user.logout') }}">
						<div class="row">
							<div class="col-md-2">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								Logout
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-9" style="padding-top: 30px;padding-left:50px;">
			<div class="row">
				@yield('profile-content')
			</div>
		</div>
	</div>
@endsection