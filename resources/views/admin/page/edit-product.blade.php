@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="breadcrumb-holder">   
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Manage Product</li>
        </ul>
    </div>
</div>

<div class="container card" style="margin-left: 15px">	
    <div class="card-body">	
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ route('user.admin.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{ $product->title }}">
                    </div>
                    <div class="form_group">
                        <label for="price">Price</label>
                        <input name="price" type="text" class="form-control" id="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="browse">Product Image</label><br>   
                        <img src="{{ $product->imagePath }}" class="img-thumbnail" alt="Cinque Terre" width="136" height="36">
                        <input  name="imagePath" type="file" class="form-control-file" id="browse">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection