@extends('shopadmin.layouts.app')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Shop Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
{{-- Page Header Ends --}}
{{-- Form Starts --}}
<div class="row" id="app">
{{-- Vue id is here --}}

<div class="col-md-6">
      <div class="card">
              <div class="card-header bg-primary">
                <h5 class="card-title">Mark Your Shop Location</h5>
              </div>
              <div class="card-body"> 
                <map-component v-model="place" :latval="{{ $shop->lat }}" :lngval="{{ $shop->lng }}"></map-component>
              </div>
            </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shop Informations</h3>
                <a href="{{ route('view.shops') }}" class="btn btn-success btn-sm float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.shop',$shop->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <center>
                    <img src="{{ asset($shop->image) }}" class="img-fluid border border-primary" style="height: 180px;width: 300px;" alt="No Image Found">
                  </center>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Shop Name</label>
                    <input name="name" type="text" value="{{ $shop->name }}" class="form-control" >
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Latitude</label>
                    <input name="lat" type="text" v-if="place.lat!=null" v-model="place.lat" class="form-control" >
                    <input name="lat" type="text" v-else value="{{ $shop->lat }}" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input name="lng" type="text" v-if="place.lng!=null" v-model="place.lng" class="form-control" >
                    <input name="lng" type="text" v-else value="{{ $shop->lng }}" class="form-control" >
                  </div>
                  {{-- vue id ends here --}}
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" type="text" v-if="place.address!=null" v-model="place.address" class="form-control" rows="5" ></textarea>
                    <textarea name="address" v-else type="text" class="form-control" rows="5" >{{ $shop->address }}</textarea>
                  </div>
           
                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_photo" value="{{ $shop->image }}">
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary">Save Shop</button>
                </div>
              </div>
              </form>
            </div>
          </div>
    </div>

 <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection