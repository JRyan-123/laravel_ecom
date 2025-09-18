@extends('vendor.layouts.layout')
@section('title', 'Create Product')

@section('vendor_content')
	
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Create Product</h5>
		</div>
		<div class="card-body">
			<form action="{{ route('vendor.product.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<label for="" class="fw-bold mb-2">Product</label>
			<input type="text" class="form-control p-2" placeholder="Enter Product..." name="product_name">

			<label for="" class="fw-bold mb-2">Images</label>
			<input type="file" class="form-control p-2" placeholder="Enter Product..." name="images[]" multiple>

			<label for="" class="fw-bold mb-2">Description</label>
			<textarea name="description" id="" class="form-control" rows="5"></textarea>

			<label for="" class="fw-bold mb-2">SKU</label>
			<input type="text" class="form-control p-2" placeholder="Enter SKU..." name="sku">

			@livewire('category-subcategory')

			<label for="" class="fw-bold mb-2">Regular Price</label>
			<input type="number" class="form-control p-2" placeholder="Enter Product..." name="regular_price">

			<label for="" class="fw-bold mb-2">Discounted Price</label>
			<input type="number" class="form-control p-2" placeholder="Enter Product..." name="discounted_price">

			<label for="" class="fw-bold mb-2">Stock Quantity</label>
			<input type="number" class="form-control p-2" placeholder="Enter Product..." name="stock_quantity">

			<label for="" class="fw-bold mb-2">Slug</label>
			<input type="text" class="form-control p-2" placeholder="Enter Product..." name="slug">

			<label for="" class="fw-bold mb-2">Meta title</label>
			<input type="text" class="form-control p-2" placeholder="Enter Product..." name="meta_title">

			<label for="" class="fw-bold mb-2">Meta desciption</label>
			<input type="text" class="form-control p-2" placeholder="Enter Product..." name="meta_description">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
			
			
		</div>
	</div>

@endsection