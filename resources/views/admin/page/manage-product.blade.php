@extends('admin.page.index')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<div class="container card" style="margin-left: 0px">	
		<div class="card-body">	
			<div class="row">
				<div class="col-sm-4">
					<form action="/admin/manage-product" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title">Title</label>
				    		<input name="title" type="text" class="form-control" id="title" placeholder="Enter Book Title">
				    	</div>
				    	<div class="form_group">
				    		<label for="price">Price</label>
				    		<input name="price" type="text" class="form-control" id="price" placeholder="Enter Price">
				    	</div>
				    	<div class="form-group">
				    		<label for="description">Description</label>
				    		<textarea name="description" class="form-control" id="description" rows="3"></textarea>
				    	</div>
				    	<div class="form-group">
				    		<label for="browse">Product Image</label>
    						<input  name="imagePath" type="file" class="form-control-file" id="browse">
    					</div>
    					<button type="submit" class="btn btn-primary">Input</button>
    					{{ csrf_field() }}
					</form>

				</div>
			</div>
		</div>
</div>
@endsection