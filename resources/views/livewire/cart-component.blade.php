  <div class="row">
          <div class="col-lg-8" >
            <div class="cart-items">
              <div class="cart-header d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <h5>Product</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Price</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Quantity</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Total</h5>
                  </div>
                </div>
              </div>
              <!-- Cart Item 1 -->
              <div class="cart-item">
                  @forelse ( $items as $item )

                <div class="row align-items-center">
                  <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                    <div class="product-info d-flex align-items-center">
                      <div class="product-image">
                        <img src="{{ asset('storage/'. ($item->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}" alt="Product" class="img-fluid" loading="lazy">
                      </div>
                      <div class="product-details">
                        <h6 class="product-title">{{ $item->product->product_name }}</h6>
                        <div class="product-meta">
                          <span class="product-color">Color: Black</span>
                          <span class="product-size">Size: M</span>
                        </div>
                         <button class="btn btn-link text-danger border-0 p-0" style="text-decoration: none; font-size: 12px;" wire:click.prevent="removeItem({{ $item->id }})"> <i class="bi bi-trash"></i> Remove</button>
                       
                      </div>
                    </div>
                  </div>
                  @php
                    if($item->product->discounted_price ) {
                      $primary_price =  number_format($item->product->discounted_price, 0);
                      $secondary_price ="₱". number_format($item->product->regular_price, 0);
                    }
                    else{
                      $primary_price =  number_format($item->product->regular_price, 0);
                      $secondary_price =  '';
                    }
                  @endphp
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="price-tag">
                      <span class="current-price">₱{{ $primary_price }}</span>
                        <small style="font-size: 12px;" class="text-start text-muted fw-light text-decoration-line-through"> {{ $secondary_price }}</small>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="quantity-selector">
                      <button class="quantity-btn decrease" wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                        @if($item->quantity <= 1) wire:click.prevent="removeItem({{ $item->id }})" @endif>
                        <i class="bi bi-dash"></i>
                      </button> 
                      <input type="number" class="quantity-input" value="{{ $item->quantity }}" min="1" max="{{$item->product->stock_quantity}}" wire:change="updateQuantity({{ $item->id }}, $event.target.value)">
                      <button class="quantity-btn increase" wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                         @if($item->quantity >= $item->product->stock_quantity) disabled @endif>
                        <i class="bi bi-plus"></i>
                      </button>

                    </div>
                    <p class="text-danger small" style="font-size:10px">Last {{$item->product->stock_quantity}} items</p>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="item-total">
                      <span>₱{{ $item->quantity * $primary_price }}</span>
                    </div>
                  </div>
                </div>
              @empty
              <div>No products avaulable</div>
              @endforelse
              </div><!-- End Cart Item -->

                            <div class="cart-actions">
                <div class="row">
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="coupon-form">
                     
                    </div>
                  </div>
                  <div class="col-lg-6 text-md-end">
                   
                    <button class="btn btn-outline-remove" wire:click='clearCart'>
                      <i class="bi bi-trash"></i> Clear Cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="cart-summary">
              <h4 class="summary-title">Order Summary</h4>

              <div class="summary-item">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">₱{{$subtotal}}</span>
              </div>

              <div class="summary-item shipping-item">
                <span class="summary-label">Shipping</span>
                <div class="shipping-options">
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="standard" checked wire:change="$refresh" value="45" wire:model='shippingCost'>
                    <label class="form-check-label" for="standard">
                      Standard Delivery - ₱45.00
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="express" wire:change="$refresh" value="65" wire:model='shippingCost'>
                    <label class="form-check-label" for="express">
                      Express Delivery - ₱65.00
                    </label>
                  </div>
                  <div class="form-check text-end">
                    <input class="form-check-input" type="radio" name="shipping" id="free"  {{ $total < 300 ? 'disabled' : '' }} wire:change="$refresh" value="0" wire:model='shippingCost' 
                  >
                    <label class="form-check-label" for="free">
                      Free Shipping (Orders over $300)
                    </label>
                  </div>
                </div>
              </div>

                <div class="summary-item discount">
                <span class="summary-label">Discount</span>
                <span class="summary-value">-₱{{$discount}}</span>
              </div>

              <div class="summary-item">
                <span class="summary-label">Tax</span>
                <span class="summary-value">₱{{$tax}}</span>
              </div>

            

              <div class="summary-total">
                <span class="summary-label">Total</span>
                <span class="summary-value">₱{{$total}}</span>
              </div>

              <div class="checkout-button">
                <a href="{{ route('customer.payment') }}" class="btn btn-accent w-100">
                  Proceed to Checkout <i class="bi bi-arrow-right"></i>
                </a>
              </div>

              <div class="continue-shopping">
                <a href="{{ route('category') }}" class="btn btn-link w-100">
                  <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
              </div>

              <div class="payment-methods">
                <p class="payment-title">We Accept</p>
                <div class="payment-icons">
                  <i class="bi bi-credit-card"></i>
                  <i class="bi bi-paypal"></i>
                  <i class="bi bi-wallet2"></i>
                  <i class="bi bi-bank"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
