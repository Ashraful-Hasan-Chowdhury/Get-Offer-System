@extends('shopadmin.layouts.app')
@section('content')
{{-- Page Header starts --}}
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Discount Offer</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <span class="card-title">Write Discount Details Here</span>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body">
      <!-- Error handler -->
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
          <li>{{ $error }}</li>
        </ul>
      </div>
      @endforeach
      @endif
      <!-- Error Handler -->
      <form role="form" action="{{ route('update.offer',$offer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $offer->title }}" name="title" class="form-control" id="PostTitle" placeholder="Post Title">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                  </div>

                </div>
              </div>
      
              
            </div>

            <div class="col-md-6">
              <div class="form-group">
              <div class="form-group">
                <label for="slug">Starting Date</label>
                <input type="text" value="{{ $offer->startingdate }}" name="startingdate" class="form-control"  placeholder="dd-mm-yyyy">
              </div>
                <label for="slug">Expiry Date</label>
                <input type="text" value="{{ $offer->expirydate }}" name="expirydate" class="form-control"  placeholder="dd-mm-yyyy">
              </div>
            </div>
            </div>

            <div class="col-md-12">
              

              <div class="form-group">
                <label>Select Shops</label>
                <select class="select2" name="shops[]" multiple="multiple" data-placeholder="Select Shops" style="width: 100%;">
                  @foreach($shops as $shop)
                  <option value="{{$shop->id}}"
                    @foreach ($offer->shops as $s)
                      @if ($s->id == $shop->id)
                        selected
                      @endif
                    @endforeach
                    >{{$shop->name}}</option>
                  @endforeach
                </select>
              </div>
      
            </div>
            <div class="col-md-4">
              @if ((time()-(60*60*24)) > strtotime($offer->expirydate))
                         Status: <span class="text-danger">Expired</span>
                        @else
                         Status: <span class="text-success">Running</span>
                        @endif
            </div>
          </div>

          <div class="form-group card-body">
            <label for="editor">Details</label>
            <textarea name="details" id="editor">{{ $offer->details }}</textarea>

          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
  </div>

</section>
<script src="{{asset('public/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'

 })
 CKEDITOR.config.height = 500;

</script>
<script type="text/javascript">
  $(document).ready(function () {
  bsCustomFileInput.init();
  $('.select2').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
});
});
</script>
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