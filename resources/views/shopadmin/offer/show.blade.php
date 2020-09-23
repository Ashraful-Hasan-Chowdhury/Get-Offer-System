@extends('shopadmin.layouts.app')
@section('content')
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Offer List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Starting Date</th>
                      <th>Expiry Date</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($offers as $offer)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $offer->title }}</td>
                      <td>{{ $offer->startingdate }}</td>
                      <td>{{ $offer->expirydate }}</td>
                      <td>
                        @if ((time()-(60*60*24)) > strtotime($offer->expirydate))
                          <span class="badge badge-pill badge-danger">Expired</span>
                        @else
                          <span class="badge badge-pill badge-success">Running</span>
                        @endif
                      </td>
                      <td><a href="{{ route('edit.offer',$offer->id) }}"><i class="fas fa-edit ml-3"></i></a></td>
                      <td><a href="{{ route('delete.offer',$offer->id) }}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

    <!-- Page level custom scripts -->
  <script src="{{ asset('public/admin/js/demo/datatables-demo.js') }}"></script>
@endsection