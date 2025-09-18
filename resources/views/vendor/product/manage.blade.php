@extends('vendor.layouts.layout')
@section('title', 'Manage Product')

@section('vendor_content')
	

<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Manage Product</h5>
	</div>
	<div class="card-body">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Ratings</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach( $products as $product )
	  	 <tr>
	      <th scope="row">{{ $product->id }}</th>
	      <td>{{ $product->product_name }}</td>
	      <td > <i class="align-middle" data-feather="star" ></i><b>{{number_format($product->reviews_avg_rating,1)  ?? 0 }} </b> 
	      	<span class="text-muted">({{ $product->reviews_count}})</span></td>
	      <td class="d-flex gap-2"><a href="{{ route('vendor.product.show', $product->id ) }}" class="btn btn-info btn-sm">View</a>
	      		<form action="{{ route('vendor.product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
				    @csrf
				    @method('DELETE')
				    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
	      </td>
	    </tr>
	@endforeach
  
   
   
  </tbody>
</table>
		
	</div>
</div>
@endsection
