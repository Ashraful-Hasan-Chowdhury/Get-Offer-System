@extends('user.home')
@section('content')
<section class="site-section bg-light" id="blog-section">
      <div class="container">
        <div class="row">
          
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5">Latest Offers</h2>
          </div>
          
          @foreach ($homeOffers as $offer)
          <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="single.html"><img src="{{asset($offer->image)}}" alt="Image" class="img-fluid"
                style="width: 800px;height: 400px;" 
                ></a>
              <div class="p-4 bg-white">
                <h3><a href="single.html">{{ $offer->title }}</a></h3>
                <span class="date">{{ $offer->startingdate }}</span>
                <p>{{ $offer->shops[0]->address }}</p>
                <p class="more"><a href="{{ route('offer.details',$offer->id) }}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
          {{-- <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="single.html"><img src="{{asset('public/user/images/blog_2.jpg')}}" alt="Image" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <h3><a href="single.html">A small river named Duden flows by their place</a></h3>
                <span class="date">April 25, 2019</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="more"><a href="single.html">Read More</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="single.html"><img src="{{asset('public/user/images/blog_3.jpg')}}" alt="Image" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <h3><a href="single.html">A small river named Duden flows by their place</a></h3>
                <span class="date">April 25, 2019</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="more"><a href="single.html">Read More</a></p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </section>
@endsection