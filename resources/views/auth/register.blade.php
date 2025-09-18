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
        <h1 class="mb-2 mb-lg-0">Register</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('main')}}">Home</a></li>
            <li class="current">Register</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="register section">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="registration-form-wrapper">
              <div class="form-header text-center">
                <h2>Create Your Account</h2>
                <p>Create your account and start shopping with us</p>
              </div>

              <div class="row">
                <div class="col-lg-8 mx-auto">

                    @if ($errors->has('name') || $errors->has('password') || $errors->has('email') )
                        <div class="mt-2 text-sm text-danger">
                            @foreach ($errors->get('login') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            @foreach ($errors->get('password') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                             @foreach ($errors->get('email') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                   <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="fullName" name="name" :value="{{ old('name') }}" placeholder="Full Name" required="" autocomplete="name">
                      <label for="fullName">Full Name</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" name="email" :value="{{ old('email') }}"  placeholder="Email Address" required="" autocomplete="email">
                      <label for="email">Email Address</label>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""  autocomplete="new-password">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required=""  autocomplete="new-password">
                          <label for="password_confirmation">Confirm Password</label>
                        </div>
                      </div>
                    </div>

                    <div class="form-floating mb-4">
                      <select class="form-select" id="country" name="country" required="">
                        <option value="" selected="" disabled="">Select a role</option>
                        <option value="2">Customer</option>
                        <option value="1">Seller</option>
                      </select>
                      <label for="country">Role</label>
                    </div>


                    <div class="d-grid mb-4">
                      <button type="submit" class="btn btn-register">Create Account</button>
                    </div>

                    <div class="login-link text-center">
                      <p>Already have an account? <a href="{{ route('login')}}" class="switch-btn">Sign in</a></p>
                    </div>
                  </form>
                </div>
              </div>


              <div class="decorative-elements">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
                <div class="square square-1"></div>
                <div class="square square-2"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Register Section -->

  </main>
</body>
</html>
