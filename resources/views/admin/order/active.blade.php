@extends('admin.layouts.layout')
@section('title', 'Orders')

@section('admin_content')
<div class="row">
		<div class="col-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Active Orders</h5>
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product</th>
							<th class="d-none d-xl-table-cell">Customer</th>
							<th>Price</th>
							<th class="d-none d-md-table-cell">Status</th>
							<th class="text-end">Action</th>
						</tr>
					</thead>
					<tbody>

						@forelse( $activeOrders as $order)
						@php 
							switch($order->status){
								case 'In Transit':
									$bg = 'bg-secondary';
									$hidden = '';
								break;
								case 'Pending':
									$bg = 'bg-warning';
									$hidden = 'd-none';
								break;
								case 'Cancelled':
									$bg = 'bg-danger';
									$hidden = 'd-none';
								break;
							}
						@endphp
						<tr>
							<td>{{ $order->id }}</td>
							<td>{{ $order->items->first()->product->product_name }}</td>
							<td>{{ $order->customer->name }}</td>
					
							<td class="d-none d-xl-table-cell">₱{{ $order->total }}</td>
							<td><span class="badge {{$bg}} ">{{ $order->status }}</span></td>
							
							<td class="text-end"><form action="{{ route('admin.order.update', $order->id) }}" class="{{ $hidden}}" method="POST" onsubmit="return confirm('Are you sure?');">
							    @csrf
							    @method('PUT')
							    <button type="submit" class="btn btn-success btn-sm">Proceed</button>
							</form></td>
						</tr>
						@empty
						<p>no products</p>
						@endforelse
					</tbody>
				</table>
				<div>
					{{ $activeOrders->links() }}
				</div>
			</div>
			
		</div>
		
	</div>

@endsection