@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="breadcrumb-holder">   
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
        </ul>
    </div>
</div>

   
    <div class="container card" style="margin-left: 15px">  
        <div class="card-body"> 
            <div class="row" style="margin-left: 40px">
                <div>
                    <table class="table">
                        <thead>
                            <tr style="text-align:center">
                                <th>Book Cover</th>
                                <th>Book Title</th>
                                <th>Descripton</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="{{ $product->imagePath }}" class="img-thumbnail" alt="Cinque Terre" width="136" height="36"> </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>Rp {{ $product->price }}</td>
                                <td><a href="{{ route('user.admin.edit', ['id' => $product->id]) }}" class="btn btn-success" role="button">Edit</a>
                                <a href="{{ route('user.admin.delete', ['id' => $product->id]) }}" class="btn btn-success" role="button">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection