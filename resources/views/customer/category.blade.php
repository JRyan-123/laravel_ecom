@extends('layouts.user')
@section('home')
  <main class="main">


    <div class="container">
      <div class="row">

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

           

            @livewire('filter-product')

                       
            @livewire('filter-price')

          </div>

        </div>

        <div class="col-lg-8">

          <!-- Category Header Section -->
          <section id="category-header" class="category-header section">

            <div class="container" data-aos="fade-up">

             
                  @livewire('active-filters')
       


            </div>

          </section><!-- /Category Header Section -->

          <!-- Category Product List Section -->
          <section id="category-product-list" class="category-product-list section">
         
            <div class="container" data-aos="fade-up" data-aos-delay="100">

             

               
              

              @livewire('list-product')

           

            </div>

          </section><!-- /Category Product List Section -->

          <!-- Category Pagination Section -->
    
        </div>

      </div>
    </div>

  </main>
  @endsection