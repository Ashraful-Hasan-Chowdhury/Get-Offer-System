@extends('user.home')
@section('content')
<section class="contact-page-area section-gap" id="app" >
            <center>
              <div class="container mt-3">
                  <a href="{{ url('/aarong') }}" class="btn btn-sm btn-success">Aarong</a>
                  <a href="{{ url('/bkash') }}" class="btn btn-sm btn-success">Bkash</a>
                  <a href="{{ url('/bajaj') }}" class="btn btn-sm btn-success">Bajaj</a>
              </div>
              @if ($status == "aarong")
                <h1 class="mt-5">Offers From Aarong</h1>
                <h5><a href="https://www.aarong.com/" class="text-info">Visit Aarong</a></h5>
                <hr>
                {!!htmlspecialchars_decode($discount[1])!!}
              @endif

              @if ($status == "bkash")
                <h1 class="mt-5">Offers From Bkash</h1>
                <h5><a href="https://www.bkash.com/" class="text-info">Visit Bkash</a></h5>
                <hr>
                {!!htmlspecialchars_decode($discount[0])!!}
              @endif

              @if ($status == "bajaj")
                <h1 class="mt-5">Offers From Bajaj</h1>
                <h5><a href="https://bangladesh.globalbajaj.com/" class="text-info">Visit Bajaj</a></h5>
                <hr>
                {!!htmlspecialchars_decode($discount[0])!!} <br><br><br>
                {!!htmlspecialchars_decode($discount[1])!!}
              @endif

              
            </center>
    	 
    </section>
@endsection