   <!-- Main Header -->
    <div class="main-header">
      <div class="container-fluid container-xl">
        <div class="d-flex py-3 align-items-center justify-content-between">

          <!-- Logo -->
          <a href="{{route('/')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename"> <img src="{{ asset('home_assets/assets/img/logo.png')}}" alt=""> SampleShop</h1>
          </a>

         

          @livewire('search-filter')

         
@auth     
@livewire('span-component')
@endauth        

@guest         
  <div class="header-actions d-flex align-items-center justify-content-end">

            <!-- Mobile Search Toggle -->
            <button class="header-action-btn mobile-search-toggle d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
              <i class="bi bi-search"></i>
            </button>

            <!-- Sign-in -->
            <a href="{{ route('login') }}" class="header-action-btn d-none d-md-block">
             Sign-in
            </a>
            <!-- Register -->
            <a href="{{ route('register') }}" class="header-action-btn d-none d-md-block">
              Register
            </a>

           

            <!-- Mobile Navigation Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

          </div>
@endguest
        </div>
      </div>
    </div>
