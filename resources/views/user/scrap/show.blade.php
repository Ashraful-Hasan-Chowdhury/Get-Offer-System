@extends('user.home')
@section('content')
<div class="site-section first-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <h2 class="lead">{{ $offer->title }}</h2>
            <p><img src="{{ asset($offer->image) }}" alt="Image" class="img-fluid"></p>
            <div class="pt-2">
              <p>Available Shops: 
	              @foreach ($offer->shops as $shop)
	              		@if($loop->index > 0)
							,
	              		@endif
						<a href="{{ route('shop.details',$shop->id) }}" class="text-info">{{ $shop->name }}</a>
					@endforeach
              </p>
            </div>
            
            
            <p>Expiry Date: <span >{{ $offer->expirydate }}</span></p>
            

            <p>{!!htmlspecialchars_decode($offer->details)!!}</p>
            

          </div>
          
        </div>
      </div>
    </div>  
@endsection