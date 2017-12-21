@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="breadcrumb-holder">   
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ul>
    </div>
</div>

<div class="container card" style="margin-left: 15px">	
    <div class="card-body">	
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ route('user.admin.update.user', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Name</label>
                        <input name="fullname" type="text" class="form-control" id="fullname" value="{{ $user->fullname }}">
                    </div>
                    <div class="form_group">
                        <label for="address">Address</label>
                        <input name="address" type="text" class="form-control" id="address" value="{{ $user->address }}">
                    </div>
                    <div class="form_group">
                        <label for="city">City</label>
                        <input name="city" type="text" class="form-control" id="city" value="{{ $user->city }}">
                    </div>
                    <div class="form_group">
                        <label for="state">State</label>
                        <input name="state" type="text" class="form-control" id="state" value="{{ $user->state }}">
                    </div>
                    <div class="form_group">
                        <label for="country">Country</label>
                        <input name="country" type="text" class="form-control" id="country" value="{{ $user->country }}">
                    </div>
                    <div class="form_group">
                        <label for="zipcode">Zipcode</label>
                        <input name="zipcode" type="text" class="form-control" id="zipcode" value="{{ $user->zipcode }}">
                    </div>
                    <div class="form_group">
                        <label for="phone">Phone</label>
                        <input name="phone" type="text" class="form-control" id="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="form_group">
                        <label for="birthdate">Birthdate</label>
                        <input name="birthdate" type="date" class="form-control" id="birthdate" value="{{ $user->birthdate }}">
                    </div>
                    <div class="form_group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection