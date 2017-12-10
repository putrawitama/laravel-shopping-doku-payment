@extends('layouts.master')

@section('content')
	<!-- gone fatur -->
	<!-- <div class="row">
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
				<button type="submit" class="btn btn-primary">Sign Up</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div> -->

	<div class="row" style="padding-top: 30px">
            <div class="col-md-12">
                <p style="text-align: center; padding-top: 35px">
                    <img src="{{ asset('img/logo.png') }}" width="200" height="55" class="d-inline-block align-top" alt="Logo">
                </p>
                <p style="text-align: center; font-size: large; ">
                    <strong>DAFTAR DI FATHUR-PEDIA</strong>
                </p>
                <p style="text-align: center;">
                    Sudah punya akun? Masuk <a href="{{route('user.signin')}}" style="color: #e89e30">disini</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <h4 class="card-header" style="text-align: center; background-color: #e89e30">Daftar</h4>
                    <div class="card-body">
                    	@if(count($errors) > 0)
                    		<div class="alert alert-danger">
                    			@foreach($errors->all() as $error)
                    				<p> {{ $error }} </p>
                    			@endforeach
                    		</div>
                    	@endif
                        <form action=" {{ route('user.signup') }} " method="post">
                            <!-- <div class="form-group">
                                <label class="col-form-label" for="">Nama Lengkap</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-circle-o" style="font-size: 20px"></i>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="">Nomor Telpon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone-square" style="font-size: 23px"></i>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-form-label" for="">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope" style="font-size: 20px"></i>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="">Kata Sandi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt" style="font-size: 27px"></i>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning" style="width: 100%; padding-top: 10px">Daftar Akun</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection