@extends('layouts.user')
@section('title', 'Wishlist')
@section('home')
 <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Account</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Account</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Account Section -->
    <section id="account" class="account section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu d-lg-none mb-4">
          <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
            <i class="bi bi-grid"></i>
            <span>Menu</span>
          </button>
        </div>

        <div class="row g-4">
          <!-- Profile Menu -->
          <div class="col-lg-3">
            <div class="profile-menu collapse d-lg-block" id="profileMenu">
              <!-- User Info -->
              <div class="user-info" data-aos="fade-right">
                <div class="user-avatar">
                  <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" alt="Profile" loading="lazy">
                  <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                </div>
                <h4>{{ $user->name }}</h4>
                <div class="user-status">
                  <i class="bi bi-award"></i>
                  <span>Premium Member</span>
                </div>
              </div>
        
              <!-- Navigation Menu -->
              <nav class="menu-nav">
                <ul class="nav flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                      <i class="bi bi-box-seam"></i>
                      <span>My Orders</span>
                
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#wishlist">
                      <i class="bi bi-heart"></i>
                      <span>Wishlist</span>
                    </a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#toreviews">
                      <i class="bi bi-star"></i>
                      <span>My Reviews</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#settings">
                      <i class="bi bi-gear"></i>
                      <span>Account Settings</span>
                    </a>
                  </li>
                </ul>

                <div class="menu-footer">
                  <a href="#" class="help-link ">
                    <i class="bi bi-question-circle"></i>
                    <span>Help Center</span>
                  </a>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                  <div  class="nav-link" >
                    <i class="bi bi-box-arrow-right"></i>  
                              <input type="submit" class="btn  p-0 m-0" value="Logout" >
                    </div>
                  </form>
                </div>
              </nav>
            </div>
          </div>

          <!-- Content Area -->
          <div class="col-lg-9">
            <div class="content-area">
              <div class="tab-content">
                <!-- Orders Tab -->

              <div class="tab-pane fade show active" id="orders">
               @livewire('orders-tab')
             </div>

                <!-- Wishlist Tab -->
              <div class="tab-pane fade" id="wishlist">
               @livewire('wishlist-tab')
              </div>

              
                 <!-- Reviews Tab -->
              <div class="tab-pane fade" id="toreviews">
              @livewire('to-reviews-tab')
              </div>
                <!-- Settings Tab -->
              <div class="tab-pane fade" id="settings">
                @include('customer.profile.partials.settings-tab')
              </div>
              
            </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Account Section -->

  </main>
  <script>
    //redirect directly on tab
  document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
      const trigger = document.querySelector(`[data-bs-toggle="tab"][href="#${tab}"]`);
      if (trigger) {
        const tabInstance = new bootstrap.Tab(trigger);
        tabInstance.show();
      }
  });
</script>

@endsection