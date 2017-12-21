@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="breadcrumb-holder">   
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
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
                                <th>ID</th>
                                <th>Date</th>
                                <th>User ID</th>
                                <th>Cart</th>
                                <th>Payment ID</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td>12345</td>
                                <td>13-13-2013</td>
                                <td>001</td>
                                <td>Harry Potter</td>
                                <td>-</td>
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