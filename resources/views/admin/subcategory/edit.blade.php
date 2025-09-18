@extends('admin.layouts.layout')
@section('title', 'Edit Subcategory')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Edit Subcategory</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST" >
			@csrf
			@method('PUT')
			<label for="" class="fw-bold mb-2">Subcategory</label>
			<input type="text" class="form-control p-2" placeholder="Enter category..." name="subcategory_name" value="{{ $subcategory->subcategory_name }}">

			<label for="" class="fw-bold mb-2">Category</label>
			<select name="category_id" id="" class="form-control p-2">
				@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}> {{ $category->category_name }}</option>
				@endforeach
			</select>
			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>

@endsection