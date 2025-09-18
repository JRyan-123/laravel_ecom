 <!-- Navigation -->
    <div class="header-nav">
      <div class="container-fluid container-xl position-relative">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('main') }}" class=" @active('main')">Home</a></li>
            <li><a href="{{ route('about') }}" class=" @active('about')">About</a></li>
            <li><a href="{{ route('category') }}" class=" @active('category')">Products</a></li>
            
            

            <li><a href="{{ route('contact') }}" class=" @active('contact')">Contact</a></li>

          </ul>
        </nav>
      </div>
    </div>
    <div style="display: none;">
      @livewire('add-to-cart')
    </div>