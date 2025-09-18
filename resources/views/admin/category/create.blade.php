@extends('admin.layouts.layout')
@section('title', 'create category')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Create Category</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.category.store')}}" method="POST" >
			@csrf
			<label for="" class="fw-bold mb-2">Category</label>
			<input type="text" class="form-control p-2" placeholder="Enter category..." name="category_name">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>

@endsection