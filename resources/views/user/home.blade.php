<!doctype html>
<html lang="en">
  <head>
    @include('user.layouts.head')
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      @include('user.layouts.nav')
      
    </header>


    <div class="site-blocks-cover overlay bg-light" style="background-image: url('{{asset('public/user/images/hero_bg_1.jpg')}}'); " id="home-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 text-center align-self-center text-intro">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h1 class="text-white" data-aos="fade-up" data-aos-delay="">Welcome to Get Offer System</h1>
            {{--     <p class="lead text-white" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos magnam maxime voluptates libero, nobis impedit aut corrupti sunt possimus.</p> --}}
                {{-- <p data-aos="fade-up" data-aos-delay="200"><a href="#services-section" class="btn smoothscroll btn-primary">Our Services</a></p> --}}
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>  
    
    @yield('content');
{{--     @include('user.layouts.about')
    @include('user.layouts.services')
    @include('user.layouts.projects')
    @include('user.layouts.client')
    @include('user.layouts.blog')
    @include('user.layouts.contact') --}}
    @include('user.layouts.footer')

  </div> <!-- .site-wrap -->

    @include('user.layouts.scripts')
  
  </body>
</html>