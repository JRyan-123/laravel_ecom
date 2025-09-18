@extends('vendor.layouts.layout')
@section('title', 'Reviews')

@section('vendor_content')
<div class="container">
    <div class="row">
      <!-- Title -->
      <div class="col-12 mb-4">
        <h2 class="fw-bold">Customer Reviews</h2>
        <p class="text-muted">What our customers are saying</p>
      </div>

      @forelse($reviews as $review)
      <!-- Review 1 -->
      <div class="col-md-6 mb-1">
        <div class="card review-card p-3">
          <div class="review-header mb-2 d-flex gap-4">
              <img src="{{ asset('storage/'. ($review->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}" width="50" height="50" alt="user">
            <div >
              <h6 class="mb-0 fw-semibold">{{ $review->customer->name }} </h6>
              <small class="text-muted">{{ $review->created_at->format('F j Y') }} </small><br>
              <i class="align-middle" data-feather="star"></i> <span>{{ $review->rating }} / 5</span>
            </div>
          </div>
          <span></span>
          <p class="mb-0">{{ $review->review }}</p>
        </div>
      </div>
      @empty
      <div>no reviews yet</div>
      @endforelse
  

  </div>
<div>
    {{$reviews->links()}}
</div>
</div>

@endsection