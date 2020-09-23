<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">
            Dashboard
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"><i class="fas fa-user-lock text-white mr-2 ml-3"></i>{{ auth('admin')->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Shops
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.view.shops') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>
                  <p>View Shops</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('admin.view.shopadmins') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Shop Admins</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.offers.show') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Offers</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuGuide')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Shop Admins
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view.shopadmin') }}" class="nav-link @yield('addGuide')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>View Requests</p>
                </a>
              </li>
            {{-- <li class="nav-item">
              <a href="{{ route('view.guides') }}" class="nav-link @yield('viewGuide')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Manage Profiles</p>
              </a>
            </li> --}}
          </ul>
        </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
