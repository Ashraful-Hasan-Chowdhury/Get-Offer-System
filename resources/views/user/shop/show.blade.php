@extends('user.home')
@section('content')
<section class="contact-page-area section-gap">
    	<div class="col-md-8 offset-2 mt-3 blog-content">
    		<p><img src="{{ asset($shop->image) }}" alt="Image" class="img-fluid"></p>
            <p class="lead">{{ $shop->name }}</p>
            <p>{{ $shop->address }}</p>
            <p>{{ $shop->shopadmins[0]->email }}</p>
          </div>
    </section>   
@endsection