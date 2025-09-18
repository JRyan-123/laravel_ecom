   <div class="col-lg-7">
                  <form method="post" action="{{route('customer.add.order')}}">
                        @csrf 
          <div class="checkout-section" id="customer-info">
                  <div class="section-header">
                    <div class="section-number">1</div>
                    <h3>Customer Information</h3>
                  </div>
                  <div class="section-content">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="first-name">Recipient</label>
                        <input type="text" name="recipient" class="form-control" id="first-name" placeholder="Your Full Name" required="">
                      </div>
                      <div class="col-md-6 form-group">
                       <label for="phone">Phone Number</label>
                      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="first-name">City</label>
                        <input type="text" name="city" class="form-control"  placeholder="Enter city" required="">
                      </div>
                      <div class="col-md-8 form-group">
                       <label for="phone">District</label>
                      <input type="text" class="form-control" name="district"  placeholder="Enter District/Brgy" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Street Address</label>
                      <input type="text" class="form-control" name="line1"  placeholder="Enter to complete the address" required="">
                    </div>
                    <div class="form-group">
                      <label for="phone">Specifics(optional)</label>
                      <input type="text" class="form-control" name="line2" placeholder="Specifics">
                    </div>
                  </div>
                </div>
          

            <!-- Checkout Form -->
           <div class="checkout-container" data-aos="fade-up">

               
                   <!-- Payment Method -->
                <div class="checkout-section" id="payment-method">
                  <div class="section-header">
                    <div class="section-number">2</div>
                    <h3>Payment Method</h3>
                  </div>
                  <div class="section-content">
                    <div class="payment-options active">
                      <div class="payment-option">
                        <input type="radio" name="method" id="cod" value="Cash on delivery"  checked="">
                        <label for="cod">
                          <span class="payment-icon"><i class="bi bi-cash-coin"></i></span>
                          <span class="payment-label">Cash On Delivery</span>
                        </label>
                      </div>

                      <div class="payment-option ">
                        <input type="radio" name="method" value="Credit/Debit Card" id="credit-card">
                        <label for="credit-card">
                          <span class="payment-icon"><i class="bi bi-credit-card-2-front"></i></span>
                          <span class="payment-label">Credit / Debit Card</span>
                        </label>
                      </div>
                      
                      <div class="payment-option">
                        <input type="radio" name="method" value="E-wallet" id="apple-pay">
                        <label for="apple-pay">
                          <span class="payment-icon"><i class="bi bi-wallet2"></i></span>
                          <span class="payment-label">E-wallet</span>
                        </label>
                      </div>
                    </div>
                    
                    <div class="payment-details " id="cod-details">
                      <p class="payment-info">Payment is on delivery</p>
                    </div>

                    <div class="payment-details d-none" id="credit-card-details">
                      <p class="payment-info">Enter details</p>
                    </div>

                    <div class="payment-details d-none" id="apple-pay-details">
                      <p class="payment-info">You will be prompted to authorize payment with Apple Pay.</p>
                    </div>
                  </div>
                </div>

                <!-- Order Review -->
                <div class="checkout-section" id="order-review">
                  <div class="section-header">
                    <div class="section-number">3</div>
                    <h3>Review &amp; Place Order</h3>
                  </div>
                  <div class="section-content">
                    <div class="form-check terms-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms" required="">
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                      </label>
                    </div>
                    <div class="success-message d-none">Your order has been placed successfully! Thank you for your purchase.</div>
                    <div class="place-order-container">
                      
                      <button type="submit" class="btn btn-primary place-order-btn">
                        <span class="btn-text">Place Order</span>
                        <span class="btn-price">₱{{$total}}</span>
                      </button>
                      
                    </div>
                  </div>
                </div>
            
            </div> 
          </form>
          </div>
       
