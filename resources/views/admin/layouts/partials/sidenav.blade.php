<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
          <span class="align-middle">Admin Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item @active('admin.dashboard')">
						<a class="sidebar-link" href="{{ route('admin.dashboard') }}">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					
					

					<li class="sidebar-header">
						Category
					</li>

					<li class="sidebar-item @active('admin.category.create')">
						<a class="sidebar-link" href="{{ route('admin.category.create') }}">
              				<i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
            			</a>
					</li>

					<li class="sidebar-item @active('admin.category.manage')">
						<a class="sidebar-link" href="{{ route('admin.category.manage') }}">
              				<i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            			</a>
					</li>

				

					
					<li class="sidebar-header">
						Sub-Category
					</li>

					<li class="sidebar-item @active('admin.subcategory.create')">
						<a class="sidebar-link" href="{{ route('admin.subcategory.create') }}">
              				<i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
            			</a>
					</li>

					<li class="sidebar-item @active('admin.subcategory.manage')">
						<a class="sidebar-link" href="{{ route('admin.subcategory.manage') }}">
              				<i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            			</a>
					</li>


					

					<li class="sidebar-header">
						Product
					</li>

					<li class="sidebar-item @active('admin.product.product')">
						<a class="sidebar-link" href="{{ route('admin.product.product') }}">
              				<i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Manage Product</span>
            			</a>
					</li>

					<li class="sidebar-item @active('admin.product.review')">
						<a class="sidebar-link" href="{{ route('admin.product.review') }}">
              				<i class="align-middle" data-feather="star"></i> <span class="align-middle">Manage Review</span>
            			</a>
					</li>


					<li class="sidebar-header">
						Orders
					</li>

					<li class="sidebar-item @active('admin.order.active')">
						<a class="sidebar-link" href="{{ route('admin.order.active') }}">
              				<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Active</span>
            			</a>
					</li>

					<li class="sidebar-item @active('admin.order.history')">
						<a class="sidebar-link" href="{{ route('admin.order.history') }}">
              				<i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">History</span>
            			</a>
					</li>
				
				</ul>

			
			</div>
		</nav>