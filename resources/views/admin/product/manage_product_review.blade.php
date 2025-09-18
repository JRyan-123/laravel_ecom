@extends('admin.layouts.layout')
@section('title', 'Manage Product Review')

@section('admin_content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Product Reviews</h1>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Customer Feedback</h5>
                    
                </div>

                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr>
                            <td>{{ $review->id}}</td>
                            <td>{{ $review->customer->name}}</td>
                            <td>{{ $review->product->product_name}}</td>
                            <td><i class="align-middle" data-feather="star"></i> {{ $review->rating}}</td>
                            <td>{{ $review->review }}</td>
                            <td>{{ $review->created_at->format('F j Y') }}</td>
                            <td class="text-end">
                               <form action="{{ route('admin.product.review.delete', $review->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                            </td>
                        </tr>
                        @empty
                        <div>no rviews yet</div>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$reviews->links()}}
                </div>

            </div>
           
        </div>
    </div>

</div>


@endsection