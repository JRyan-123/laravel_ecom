
<div class="product-details">
  <div class="section-header">
    <h2>My Reviews</h2>
  </div>

  <!-- Nav Tabs -->
  <ul class="nav nav-tabs" id="reviewTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button type="button"
              class="nav-link {{ $activeTab === 'completed' ? 'active' : '' }}"
              wire:click="$set('activeTab','completed')">
        Completed Reviews
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button type="button"
              class="nav-link {{ $activeTab === 'toReview' ? 'active' : '' }}"
              wire:click="$set('activeTab','toReview')">
        To Review
      </button>
    </li>
  </ul>

  <div class="tab-content mt-3" id="reviewTabsContent">
    <!-- To Review Tab -->
    <div class="tab-pane fade {{ $activeTab === 'toReview' ? 'show active' : '' }}" id="to-review" role="tabpanel" aria-labelledby="to-review-tab">
      <div class="reviews-grid">
        @forelse($toReviews as $item)
          <div class="review-card">
            <div class="review-header mb-1">
              <img src="{{ asset('storage/'. ($item->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}"
                   alt="Product" class="product-image" loading="lazy">
              <div class="review-meta">
                <h4>{{ $item->product->product_name }}</h4>
                <div class="review-date">Ordered on {{ $item->created_at->format('F j Y') }}</div>
              </div>
            </div>

            <form wire:submit.prevent="saveReview({{ $item->id }})">
              <div class="review-content">
                <textarea name="review" wire:model="review.{{ $item->id }}" class="form-control" rows="2"></textarea>
              </div>
              <div class="review-footer d-flex justify-content-between">
                <div class="star-rating mb-2">
                  @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" wire:model="rating.{{ $item->id }}" id="rating{{ $item->id }}-{{ $i }}" value="{{ $i }}">
                    <label for="rating{{ $item->id }}-{{ $i }}">★</label>
                  @endfor
                  <span> Rate product :</span>
                </div>
                <div class="end">
                  <button type="submit" class="btn btn-dark">Submit Review</button>
                </div>
              </div>
            </form>
          </div>
        @empty
          <span>No products to review</span>
        @endforelse
      </div>
 
      <div class="mt-3">
        {{ $toReviews->links() }}
      </div>
    </div>

    <!-- Completed Reviews Tab -->
    <div class="tab-pane fade {{ $activeTab === 'completed' ? 'show active' : '' }}" id="completed-review" role="tabpanel" aria-labelledby="completed-review-tab">
      <div class="reviews-grid">
        {{-- Example of completed reviews --}}
        @forelse($reviews as $review)
          <div class="review-card">
            <div class="review-header mb-1">
              <img src="{{ asset('storage/'. ($review->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}"
                   alt="Product" class="product-image" loading="lazy">
              <div class="review-meta">
                <h4>{{ $review->product->product_name }}</h4>
                 <x-star-rating :rating="$review->rating"  />
                  
                <div class="review-date">Reviewed on {{ $review->created_at }}</div>
                 <div class="review-content">
                  <p>{{ $review->review }}</p>

                </div>

              </div>

            </div>
             <div class="review-footer">
                <form action="{{ route('customer.review.delete', $review->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-delete">Delete</button>
                </form>
                
            </div>
          </div>
        @empty
          <span>No completed reviews</span>
        @endforelse
      </div>
      <div class="mt-3">
         {{ $reviews->links() }}
      </div>
    </div>
  </div>
</div>
