<div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-4">
            <h1 class="m-0 site-logo"><a href="index.html">Get Offer</a></h1>
          </div>

          <div class="col-8">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('shops') }}" class="nav-link">Nearest Shops</a></li>
                <li><a href="{{ route('offers') }}" class="nav-link">Nearest Shop Offers</a></li>
                @if (Auth::check())
                
                <li><a href="{{ url('/aarong') }}" class="nav-link">Different Website Offers</a></li>
              <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              @else
              <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            @endif
                {{-- <li><a href="#blog-section" class="nav-link">Blog</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li> --}}
              </ul>
            </nav>


            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>

          </div>

        
        </div>
      </div>