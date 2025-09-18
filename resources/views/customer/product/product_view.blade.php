@extends('layouts.user')
@section('home')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Product Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Product Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Product Details Section -->
    <section id="product-details" class="product-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
          <!-- Product Gallery -->
          <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="150">
            <div class="product-gallery">
              <div class="main-showcase">
                <div class="image-zoom-container">

                  <img src="{{ asset('storage/' . ($product->productImages->first() ? $product->productImages->first()->image_path : 'product_images/no-image.jpg')) }}" alt="Product Main" class="img-fluid main-product-image drift-zoom" id="main-product-image" data-zoom="{{ asset('storage/' . ($product->productImages->first() ? $product->productImages->first()->image_path : 'product_images/no-image.jpg')) }}">

                  <div class="image-navigation">
                    <button class="nav-arrow prev-image image-nav-btn prev-image" type="button">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="nav-arrow next-image image-nav-btn next-image" type="button">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="thumbnail-grid">
                @foreach ($product->productImages as $images)
                <div class="thumbnail-wrapper thumbnail-item" data-image="{{ asset('storage/'.$images->image_path) }}">
                  <img src="{{ asset('storage/' . ($images ? $images->image_path : 'product_images/no-image.jpg')) }}" alt="View 1" class="img-fluid">
                </div>

             
               @endforeach
              </div>
            </div>
          </div>

          <!-- Product Details -->
          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
            <div class="product-details">
              <div class="product-badge-container">
                <span class="badge-category">{{ $product->category->category_name }}</span>
                <div class="rating-group">
                 <x-star-rating :rating="$product->reviews_avg_rating" :reviews="$product->reviews_count" :show-value="true" />

                </div>
              </div>

              <h1 class="product-name">{{ $product->product_name }}</h1>

              <div class="pricing-section">
                <div class="price-display">
                  @if ( $product->discounted_price )
                  <span class="sale-price">{{ $product->discounted_price }}</span>
                  <span class="regular-price">{{ $product->regular_price }}</span>
                    </div>
                      <div class="savings-info">
                        <span class="save-amount"> Save ₱{{  $diff = $product->regular_price - $product->discounted_price }}</span>
                        <span class="discount-percent">({{ number_format(($diff/ $product->regular_price)*100,0) }}% off)</span>
                      </div>
                  @else
                  <span class="sale-price">{{ $product->regular_price }}</span>
                    </div>
                  @endif
                  
              
              </div>

              <div class="product-description">
                <p>{{ $product->description }}</p>
              </div>

              <div class="availability-status">
                <div class="stock-indicator">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="stock-text">Available</span>
                </div>
                <div class="quantity-left">{{ $product->stock_quantity }}</div>
              </div>

              <!-- Product Variants -->
             

              <!-- Purchase Options -->
              <div class="purchase-section">
                <div class="quantity-control">
                  <label class="control-label">Quantity:</label>
                  <div class="quantity-input-group">
                    <div class="quantity-selector">
                      <button class="quantity-btn decrease" type="button">
                        <i class="bi bi-dash"></i>
                      </button>
                      <input type="number" class="quantity-input" value="1" min="1" max="{{ $product->stock_quantity }}">
                      <button class="quantity-btn increase" type="button">
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
            
                <div class="action-buttons">
                  @livewire('add-to-cart',  ['id' => $product->id])
                   
                  
                  <button class="btn secondary-action">
                    <i class="bi bi-lightning"></i>
                    Buy Now
                  </button>
                  <button class="btn icon-action" title="Add to Wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
              </div>

              <!-- Benefits List -->
              <div class="benefits-list">
                <div class="benefit-item">
                  <i class="bi bi-truck"></i>
                  <span>Free delivery on orders over $75</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-arrow-clockwise"></i>
                  <span>45-day hassle-free returns</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-shield-check"></i>
                  <span>3-year manufacturer warranty</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-headset"></i>
                  <span>24/7 customer support available</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Information Tabs -->
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
          <div class="col-12">
            <div class="info-tabs-container">
              <nav class="tabs-navigation nav">
                
                 <button class="nav-link" data-bs-toggle="collapse" data-bs-target="#reviewsToggle" type="button">
    Reviews  
  </button>
              </nav>

              <div class="tab-content">
              

                <!-- Reviews Tab -->
                <div class="collapse" id="reviewsToggle">
                  <div class="reviews-content">
                   

                    <div class="customer-reviews-list">
                      @forelse($product->reviews as $review)
                      <div class="review-card">
                        <div class="reviewer-profile">
                          <img src="" alt="Customer" class="profile-pic">
                          <div class="profile-details">
                            <div class="customer-name">{{$review->customer->name}}</div>
                            <div class="review-meta">
                              <x-star-rating :rating="$review->rating"  />
                              <span class="review-date">{{$review->created_at->format('F j, Y')}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="review-text">
                          <p>{{$review->review}}</p>
                        </div>
                      
                      </div>
                      @empty
                      <div>no reviews</div>
                      @endforelse

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- /Product Details Section -->

  </main>
  @endsection