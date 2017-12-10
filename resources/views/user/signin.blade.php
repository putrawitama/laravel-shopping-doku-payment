@extends('layouts.master')

@section('style')
<style type="text/css">
	@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
	.login-block{
		float:left;
		width:100%;
		padding : 50px 0;
		}
	.banner-sec{
		background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom;
		background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;
		}
	.container{
		background:#fff; border-radius: 10px; 
		box-shadow:15px 20px 0px rgba(0,0,0,0.1);
		}
	.carousel-inner{
		border-radius:0 10px 10px 0;
		}
	.carousel-caption{
		text-align:left; left:5%;
		}
	.login-sec{
		padding: 50px 30px; position:relative;
	}
	.login-sec .copy-text{
		position:absolute; width:80%; bottom:20px; 
		font-size:13px; text-align:center;
	}
	.login-sec .copy-text i{
		color:#FEB58A;
	}
	.login-sec .copy-text a{
		color:#E36262;
	}
	.login-sec h2{
		margin-bottom:30px; font-weight:800;
		font-size:30px; color: #DE6262;
	}
	.login-sec h2:after{
		content:" "; width:100px; height:5px; 
		background:#FEB58A; display:block; 
		margin-top:20px; border-radius:3px; 
		margin-left:auto;margin-right:auto
	}
	.btn-login{
		background: #DE6262; 
		color:#fff; font-weight:600;
	}
	.banner-text{
		width:70%; position:absolute; 
		bottom:40px; padding-left:20px;
	}
	.banner-text h2{
		color:#fff; font-weight:600;
	}
	.banner-text h2:after{
		content:" "; width:100px; height:5px;
		background:#FFF; display:block; 
		margin-top:20px; border-radius:3px;
	}
	.banner-text p{color:#fff;}
</style>
@endsection

@section('content')
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

	<section class="login-block" style="background-color: #e89e30; margin-top: 80px; padding: 20px 0px 20px 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 login-sec">
					<h2 class="text-center">Login Now</h2>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<p> {{ $error }} </p>
							@endforeach
						</div>
					@endif
					<form class="login-form" action=" {{ route('user.signin') }} " method="post">
						<div class="form-group">
							<label for="email" class="text-uppercase">E-mail</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1" class="text-uppercase">Password</label>
							<input type="password" class="form-control" placeholder="">
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								<small>Remember Me</small>
							</label>
							<button type="submit" class="btn btn-login btn-primary float-right">Submit</button>
						</div>
						{{ csrf_field() }}
					</form>
					<!-- <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div> -->
				</div>
				<div class="col-md-8 banner-sec">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>	
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/568799/580/386/m1/fpnw/wm0/bbanner4-.jpg?1437054945&s=306fa2ab1f4cfd00407544ff3fced9cc" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection