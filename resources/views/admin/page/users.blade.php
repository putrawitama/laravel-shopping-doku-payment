@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="breadcrumb-holder">   
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ul>
    </div>
</div>

<div class="container card">  
    <div class="card-body"> 

        <div class="row" style="margin-left: 10px">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>ZipCode</th>
                            <th>Phone</th>
                            <th>Birth Date</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->zipcode }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->birthdate }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('user.admin.edit.user', ['id' => $user->id]) }}" class="btn btn-success" role="button">Edit</a>
                            <a href="{{ route('user.admin.delete.user', ['id' => $user->id]) }}" class="btn btn-success" role="button">Delete</a></td>
                        </tr>
                        @endforeach                      
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>

@endsection