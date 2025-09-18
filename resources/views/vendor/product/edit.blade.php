@extends('vendor.layouts.layout')
@section('title', 'Edit Product')

@section('vendor_content')
	
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Edit Product</h5>
		</div>
		<div class="card-body">
			@foreach( $products as $product )
			<form action="{{ route('vendor.product.update', $product->id)}}" method="POST">
			@csrf
			@method('PUT')
			<label for="" class="fw-bold mb-2">Product</label>
			<input type="text" class="form-control p-2" value="{{$product->product_name}}" name="product_name">

			<label for="" class="fw-bold mb-2">Description</label>
			<textarea name="description" id="" class="form-control" rows="5">{{$product->description}}</textarea>

			<label for="" class="fw-bold mb-2">Regular Price</label>
			<input type="number" class="form-control p-2" value="{{$product->regular_price}}" name="regular_price">

			<label for="" class="fw-bold mb-2">Discounted Price</label>
			<input type="number" class="form-control p-2" value="{{$product->discounted_price}}" name="discounted_price">

			<label for="" class="fw-bold mb-2">Stock Quantity</label>
			<input type="number" class="form-control p-2" value="{{$product->stock_quantity}}" name="stock_quantity">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
			
		</form>
			@endforeach
			
		</div>
	</div>

@endsection