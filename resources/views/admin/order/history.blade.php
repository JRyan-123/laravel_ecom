@extends('admin.layouts.layout')
@section('title', 'Order History')

@section('admin_content')
<div class="row">
		<div class="col-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Orders</h5>
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Qty</th>
							<th>Product ID</th>

							<th>Product</th>

							<th class="d-none d-xl-table-cell">Customer</th>

							<th>Price</th>
							<th class="d-none d-md-table-cell">Status</th>

						</tr>
					</thead>
					<tbody>

						@forelse( $orders as $order)
						@php 
							switch($order->status){
								case 'Completed':
									$bg = 'bg-success';
									$hidden = '';
								break;
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
							<td>@foreach($order->items as $item)
								{{ $item->quantity }} <br>
							@endforeach</td>
							<td>@foreach($order->items as $item)
								{{ $item->product->id }} <br>
							@endforeach</td>
							<td>@foreach($order->items as $item)
								{{ $item->product->product_name }} <br>
							@endforeach</td>
							
							<td>{{ $order->customer->name }}</td>
							<td class="d-none d-xl-table-cell">₱{{ $order->total }}</td>
							<td><span class="badge {{$bg}} ">{{ $order->status }}</span></td>
							
							
						</tr>
						@empty
						<p>no products</p>
						@endforelse
					</tbody>
				</table>
				<div>
				{{ $orders->links() }}
			</div>
			</div>
			
		</div>
		
	</div>

@endsection