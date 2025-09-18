<div class="row g-4">
 <div class="mb-4">
        <label for="sort" class="block text-sm font-medium text-black mb-1">
            Sort Products
        </label>
        <select wire:model.live="sortOption" id="sort"
            class="w-60 p-2 border border-black bg-white text-black rounded-lg">
            <option value="latest">Latest</option>
            <option value="best">Best Seller</option>
            <option value="relevance">Relevance</option>
            <option value="price_low_high">Price (Low → High)</option>
            <option value="price_high_low">Price (High → Low)</option>
        </select>
    </div>


@forelse($products as $product)

    <div class="col-6 col-xl-4">
        <div class="product-card border shadow"  @click="window.location='{{ route('product_view', $product->id) }}'">
            <div class="product-image">
                <img src="{{ asset('storage/' . ($product->productImages->get(0)?->image_path ?? 'product_images/no-image.jpg')) }}" class="main-image img-fluid" alt="Product">
                <img src="{{ asset('storage/' . ($product->productImages->get(1)?->image_path ?? 'product_images/no-image.jpg')) }}" class="hover-image img-fluid" alt="Product Variant">
                <div class="product-overlay">
                    <div class="product-actions">
                        <button type="button" class="action-btn" wire:click="addToHeart({{ $product->id }})" @click.stop>
                            <i class="bi bi-heart"></i>
                        </button>
                        <button type="button" class="action-btn" wire:click="addToCart({{ $product->id }})" @click.stop>
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="product-details">
                <div class="product-category">{{ $product->category->category_name }}</div>
                <h4 class="product-title">
                    <a href="">{{ $product->product_name }}</a>
                </h4>
                <div class="product-meta">
                      @if ( $product->discounted_price )
                      <div class="product-price">₱{{ number_format($product->discounted_price,0) }}</div>
                      <small style="font-size: 12px;" class="text-start text-muted fw-light text-decoration-line-through">₱ {{ number_format($product->regular_price,0) }}</small>
                        
                        
                      @else
                        <div class="product-price">₱{{ number_format($product->regular_price,0) }}</div>
                     
                      @endif
                    
                    <div class="product-rating">
                        <i class="bi bi-star-fill"></i>
                        {{ number_format($product->reviews_avg_rating,1)  }} <span class="d-none d-md-block">({{ $product->reviews_count }})</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @empty
    <div class="col-12 text-center py-5">
        <p>No products found.</p>
    </div>
    @endforelse

    <div class="col-12 mt-4">
        {{ $products->links() }}
    </div>
</div>
