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

    <div class="container card" style="margin-left: 15px">  
        <div class="card-body"> 

            <div class="row" style="margin-left: 40px">
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
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td>fullname</td>
                                <td>address</td>
                                <td>city</td>
                                <td>state</td>
                                <td>country</td>
                                <td>zipcode</td>
                                <td>phone</td>
                                <td>birth date</td>
                                <td>email</td>
                                <td>role</td>
                                <td><a href="" class="btn btn-success btn-sm" role="button">Edit</a></td>
                                <td><a href="" class="btn btn-success btn-sm" role="button">Delete</a></td>
                            </tr>
                        
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection