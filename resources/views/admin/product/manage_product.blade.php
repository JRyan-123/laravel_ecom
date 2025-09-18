@extends('admin.layouts.layout')
@section('title', 'Manage Product')

@section('admin_content')
<div class="row">
		<div class="col-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Products</h5>
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product</th>
							<th class="d-none d-xl-table-cell">Vendor</th>
							<th class="d-none d-xl-table-cell">description</th>
							<th>Category</th>
							<th class="d-none d-md-table-cell">Subcategory</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse( $products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td class="d-flex gap-3"><img src="{{ asset('storage/' . ($product->productImages->get(0)?->image_path ?? 'product_images/no-image.jpg')) }}" class="img-thumbnail" style="width: 80px; height: auto;" alt=""><p>{{ $product->product_name }}</p></td>
							<td class="d-none d-xl-table-cell">{{ $product->vendor->name }}</td>
							<td class="d-none d-xl-table-cell">{{ $product->description }}</td>
							<td>{{ $product->category->category_name }}</td>
							<td class="d-none d-md-table-cell">{{ $product->subcategory->subcategory_name }}</td>
							<td><form action="{{ route('admin.product.delete', $product->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
						    @csrf
						    @method('DELETE')
						    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form></td>
						</tr>
						@empty
						<p>no products</p>
						@endforelse
					</tbody>
				</table>
				<div>
					{{ $products->links() }}
				</div>
			</div>
		</div>
		
	</div>
@endsection