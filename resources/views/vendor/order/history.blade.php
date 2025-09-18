@extends('vendor.layouts.layout')
@section('title', 'Order History')

@section('vendor_content')
	<main class="content">
		<div class="container-fluid p-0">
			<div class="row">
						<div class="col-12  d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th class="d-none d-md-table-cell">ID</th>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											
											<th>Status</th>
											<th class="d-none d-md-table-cell">Subotal</th>
										</tr>
									</thead>
									<tbody>
										@forelse( $orders as $order )
										@php 
											switch($order->order->status){
												case 'Completed':
													$bg = 'bg-success';
													$hidden = 'd-none';

												break;
												case 'In Transit':
													$bg = 'bg-secondary';
													$hidden = 'd-none';
												break;
												case 'Pending':
													$bg = 'bg-warning';
													$hidden = '';
												break;
												case 'Cancelled':
													$bg = 'bg-danger';
													$hidden = 'd-none';
												break;
											}
										@endphp
										<tr>
											<td class="d-none d-xl-table-cell">{{$order->order_id}}</td>
											<td>{{ $order->order->customer->name }}</td>
											<td class="d-none d-xl-table-cell">{{$order->created_at->format('F j Y')}}</td>
											<td><span class="badge {{$bg}} ">{{ $order->order->status }}</span></td>
											<td class="d-none d-md-table-cell">₱{{  $order->subtotal }}</td>
											<td>
												<form action="{{ route('vendor.order.update', $order->id) }}" class="{{ $hidden}}" method="POST" onsubmit="return confirm('Are you sure?');">
												    @csrf
												    @method('PUT')
												    <button type="submit" class="btn btn-success btn-sm">Proceed</button>
												</form></td>
										</tr>
										@empty
										<p>no orders</p>
										@endforelse
									</tbody>
									
								</table>
								<div>
									{{$orders->links()}}
								</div>
							</div>
							

						</div>
					
					</div>
		</div>
	</main>
@endsection