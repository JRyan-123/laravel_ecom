<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
          <span class="align-middle">Vendor Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item @active('vendor.dashboard')">
						<a class="sidebar-link" href="{{ route('vendor.dashboard') }}">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item  @active('vendor.order.history')">
						<a class="sidebar-link" href="{{ route('vendor.order.history') }}">
			              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Order History</span>
			            </a>
					</li>

					
					

					<li class="sidebar-header">
						Store
					</li>

					<li class="sidebar-item @active('vendor.store.main')">
						<a class="sidebar-link" href="{{ route('vendor.store.main') }}">
              				<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Store</span>
            			</a>
					</li>
					<li class="sidebar-item @active('vendor.store.reviews')">
						<a class="sidebar-link" href="{{ route('vendor.store.reviews') }}">
              				<i class="align-middle" data-feather="star"></i> <span class="align-middle">Reviews</span>
            			</a>
					</li>

					

				

					
					<li class="sidebar-header">
						Product
					</li>

					<li class="sidebar-item @active('vendor.product.create')">
						<a class="sidebar-link" href="{{ route('vendor.product.create') }}">
              				<i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
            			</a>
					</li>

					<li class="sidebar-item @active('vendor.product.manage')">
						<a class="sidebar-link" href="{{ route('vendor.product.manage') }}">
              				<i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            			</a>
					</li>




					
				
				</ul>

			
			</div>
		</nav>