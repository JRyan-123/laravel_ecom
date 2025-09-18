 		
    <div class="header-actions d-flex align-items-center justify-content-end">

          <!-- Mobile Search Toggle -->
            <button class="header-action-btn mobile-search-toggle d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
              <i class="bi bi-search"></i>
            </button>
            
            <!-- Account -->
            <div class="dropdown account-dropdown">
              <button class="header-action-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
              </button>
              <div class="dropdown-menu">
                <div class="dropdown-header">
                  <h6>Welcome to <span class="sitename">Sample Store</span></h6>
                  <p class="mb-0">Access account &amp; manage orders</p>
                </div>
                <div class="dropdown-body">
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('customer.account')}}">
                    <i class="bi bi-person-circle me-2"></i>
                    <span>My Profile</span>
                  </a>
                 
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('customer.account') }}">
                    <i class="bi bi-bag-check me-2"></i>
                    <span>My Orders</span>
                  </a>
                 
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('customer.account', ['tab' => 'settings'])}}">
                    <i class="bi bi-gear me-2"></i>
                    <span>Settings</span>
                  </a>
                </div>
                <div class="dropdown-footer">
                  <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="  d-flex gap-2">
                            
                              <input type="submit" class="btn btn-outline-primary w-100" value="Logout" >
                            </div>
                            
                        </form>
                  
                </div>
              </div>
            </div>
 		<!-- Cart -->

		<a href="{{ route('customer.account', ['tab' => 'wishlist'])}}" class="header-action-btn d-none d-md-block">
              <i class="bi bi-heart"></i>
              <span class="badge">{{ $wishlistSpan }} </span>
            </a>
            <a href="{{ route('customer.cart')}}" class="header-action-btn">
                <i class="bi bi-cart3"></i>         
                 <span class="badge">
        				{{ $cartSpan }} 
        				</span>
            </a>

             <!-- Mobile Navigation Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

          </div>

 