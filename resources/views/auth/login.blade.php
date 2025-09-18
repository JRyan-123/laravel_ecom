<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'SampleShop')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('home_assets/assets/img/logo.png')}}" rel="icon">
  <link href="{{ asset('home_assets/assets/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('home_assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('home_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('home_assets/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('home_assets/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('home_assets/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('home_assets/assets/vendor/drift-zoom/drift-basic.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('home_assets/assets/css/main.css')}}" rel="stylesheet">


  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  @livewireStyles
  <!-- =======================================================
  * Template Name: NiceShop
  * Template URL: https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/
  * Updated: Aug 26 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="category-page">
    <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Login</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('main')}}">Home</a></li>
            <li class="current">Login</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="login section">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <div class="auth-container">

              <!-- Login Form -->
              <div class="auth-form login-form active">
                <div class="form-header">
                  <h3>Welcome Back</h3>
                  <p>Sign in to your account</p>
                </div>

                    @if ($errors->has('login'))
                        <div class="mt-2 text-sm text-danger">
                            @foreach ($errors->get('login') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="text" name="login" value="{{ old('login') }}" class="form-control" placeholder="Email address / Name" required autofocus autocomplete="username" />
                  </div>
                  
                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password" />
                    <span class="password-toggle">
                      <i class="bi bi-eye"></i>
                    </span>
                  </div>

                 

                  <button type="submit" class="auth-btn primary-btn mb-3">
                    Sign In
                    <i class="bi bi-arrow-right"></i>
                  </button>

                  <div class="divider">
                    <span>|</span>
                  </div>

                  

                  <div class="switch-form">
                    <span>Don't have an account?</span>
                    <a href="{{ route('register')}}" class="switch-btn">Create account</a>
                    
                  </div>
                </form>
              </div>

              <!-- Register Form -->
             

            </div>
          </div>
        </div>

      </div>

    </section><!-- /Login Section -->

  </main>

 
</body>
</html>
