@extends('user.home')
@section('content')
<section class="contact-page-area section-gap" id="app" >
		<div class="container mt-3" >
			<offer-map v-model="place"></offer-map>      
		</div>
		<div class="container mt-3">
			<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Offer List</h6>
              <form action="{{ route('offer.search') }}" class="float-right form-inline">
                <div class="form-group">
                  <select name="type" class="form-control" placeholder="Search by Type">
                    @foreach ($offers as $offer)
                         @foreach ($offer->shops as $shop)
                           <option value="{{$shop->type}}"
                              @if ($type == $shop->type)
                                selected 
                              @endif
                            >{{$shop->type}}</option>
                         @endforeach   
                        @endforeach
                  </select>
                </div>
                     {{-- <input type="text" name="type" list="offer" class="form-control" placeholder="Search by Type">
                     <datalist id="offer">
                        @foreach ($offers as $offer)
                         @foreach ($offer->shops as $shop)
                           <option value="{{$shop->type}}">{{$shop->type}}</option>
                         @endforeach
                          
                        @endforeach
                      </datalist> --}}
                   <button type="submit" class="btn btn-success btn-sm d-inline ml-2">
                     
                    Search
                  </button>
                   </form>
            </div>
            @if ($type != null)
              <div class="card-body">
              <div class="table-responsive">
                {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>  
                      <th>Title</th>
                      <th>Shop Name</th>
                      <th>Type</th>
                      <th>Shop Address</th>
                      <th>Expiry Date</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($offers as $offer)
                      @if ((time()-(60*60*24)) < strtotime($offer->expirydate))
                        @foreach ($offer->shops as $shop)
                         @if ($shop->type == $type)
                           <tr v-if="{{ $shop->lat+0.2 }} >= place.lat && {{ $shop->lat-0.2 }} <= place.lat">
                          <td>{{ $offer->title }}</td>
                          <td>{{ $shop->name }}</td>
                          <td>{{ $shop->type }}</td>
                          <td>{{ $shop->address }}</td>
                          <td>{{ $offer->expirydate }}</td>
                          <td>
                            <a href="{{ route('offer.details',$offer->id) }}" class="btn btn-sm btn-success text-dark">Details</a>
                          </td>
                        </tr>
                         @endif
                        @endforeach
                      @endif
                    @endforeach
                  </tbody>
                </table>
                {{ $offers->links() }}
              </div>
            </div>
            @endif

            @if ($type==null)
              <div class="card-body">
              <div class="table-responsive">
                {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>  
                      <th>Title</th>
                      <th>Shop Name</th>
                      <th>Type</th>
                      <th>Shop Address</th>
                      <th>Expiry Date</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($offers as $offer)
                      @if ((time()-(60*60*24)) < strtotime($offer->expirydate))
                        @foreach ($offer->shops as $shop)
                        <tr v-if="{{ $shop->lat+0.2 }} >= place.lat && {{ $shop->lat-0.2 }} <= place.lat">
                          <td>{{ $offer->title }}</td>
                          <td>{{ $shop->name }}</td>
                          <td>{{ $shop->type }}</td>
                          <td>{{ $shop->address }}</td>
                          <td>{{ $offer->expirydate }}</td>
                          <td>
                            <a href="{{ route('offer.details',$offer->id) }}" class="btn btn-sm btn-success text-dark">Details</a>
                          </td>
                        </tr>
                        @endforeach
                      @endif
                    @endforeach
                  </tbody>
                </table>
                {{ $offers->links() }}
              </div>
            </div>
            @endif
          </div>
		</div>
    	 
    </section>
@endsection