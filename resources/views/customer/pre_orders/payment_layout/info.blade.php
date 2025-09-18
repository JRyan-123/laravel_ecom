 <div class="col-lg-5">
            <!-- Order Summary -->
            <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
              <div class="order-summary-header">
                <h3>Order Summary</h3>
                <span class="item-count">2 Items</span>
              </div>

              <div class="order-summary-content">
                <div class="order-items">
                  @foreach( $items  as $item )
                  <div class="order-item">
                    <div class="order-item-image">
                      <img src="{{ asset('storage/'. ($item->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}" alt="Product" class="img-fluid">
                    </div>
                    <div class="order-item-details">
                      <h4>{{ $item->product->product_name }}</h4>
                      <p class="order-item-variant">Color: Black | Size: M</p>
                      <div class="order-item-price">
                        <span class="quantity">{{ $item->quantity }} ×</span>
                        <span class="price">₱{{ $item->product->discounted_price ?? $item->product->regular_price}}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                 
                </div>

                <div class="promo-code">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo Code" aria-label="Promo Code">
                    <button class="btn btn-outline-primary" type="button">Apply</button>
                  </div>
                </div>

                <div class="order-totals">
                  <div class="order-subtotal d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span>₱{{$subtotal}}</span>
                  </div>
                  <div class="order-shipping d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>₱{{ $selectedShipping }}</span>
                  </div>
                  <div class="order-tax d-flex justify-content-between">
                    <span>Tax</span>
                    <span>₱{{$tax}}</span>
                  </div>
                  <div class="order-total d-flex justify-content-between">
                    <span>Total</span>
                    <span>₱{{$total}}</span>
                  </div>
                </div>

                <div class="secure-checkout">
                  <div class="secure-checkout-header">
                    <i class="bi bi-shield-lock"></i>
                    <span>Secure Checkout</span>
                  </div>
                  <div class="payment-icons">
                    <i class="bi bi-cash-coin"></i>
                    <i class="bi bi-credit-card-2-front"></i>
                    <i class="bi bi-credit-card"></i>
                    <i class="bi bi-paypal"></i>
                    <i class="bi bi-apple"></i>
                    <i class="bi bi-wallet2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>