@extends('admin.layouts.layout')
@section('title', 'Manage category')

@section('admin_content')
	

<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Manage Category</h5>
	</div>
	<div class="card-body">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">SubCategory</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach($subcategories as $subcategory)
	  	 <tr>
	      <th scope="row">{{ $subcategory->id }}</th>
	      <td>{{ $subcategory->subcategory_name }}</td>
	      <td>{{ $subcategory->category->category_name }}</td>
	      <td class="d-flex gap-2"><a href="{{ route('admin.subcategory.show', $subcategory->id ) }}" class="btn btn-info btn-sm">View</a>
	      		<form action="{{ route('admin.subcategory.delete', $subcategory->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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