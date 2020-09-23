@extends('multiauth::layouts.app')
@section('content')
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Shop List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Admin Name</th>
                      <th>Email</th>
                      <th>Shops</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                   
                  <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>
                        @php
                          $i=0;
                        @endphp
                        @foreach ($admin->shops as $shop)
                          @php
                            if($i > 0){
                              echo ",";
                            }  
                          @endphp
                          {{ $shop->name }}
                          @php
                            $i++;
                          @endphp
                        @endforeach
                      </td>
                      <td><a href="{{ route('admin.shopadmin.delete',$admin->id) }}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
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