@extends('admin.layouts.layout')
@section('title', 'Create Subcategory')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Create SubCategory</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.subcategory.store')}}" method="POST" >
			@csrf
			<label for="" class="fw-bold mb-2">SubCategory</label>
			<input type="text" class="form-control p-2" placeholder="Enter category..." name="subcategory_name">

			<label for="" class="fw-bold mb-2">Category</label>
			<select name="category_id" id="" class="form-control p-2">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->category_name }}</option>
				@endforeach
			</select>
			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>

@endsection