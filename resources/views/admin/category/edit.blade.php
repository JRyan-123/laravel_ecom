@extends('admin.layouts.layout')
@section('title', 'Edit category')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Edit Category</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.category.update', $category->id) }}" method="POST" >
			@csrf
			@method('PUT')
			<label for="" class="fw-bold mb-2">Category</label>
			<input type="text" class="form-control p-2" placeholder="Enter category..." name="category_name" value="{{ $category->category_name }}">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>

@endsection