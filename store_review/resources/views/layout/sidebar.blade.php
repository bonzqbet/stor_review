<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <!--<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
		<i class="fas fa-laptop-code fa-1x" ></i>
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>-->
	@section('sidebar')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @if(Session::get('active')=='')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('store.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/homeGrid" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Grid</p>
                </a>
              </li>
              @if(Session::get('status') == 'Superadmin' || Session::get('status') == 'Admin')
              <li class="nav-item">
                <a href="/create/item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Add</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
          @if(Session::get('active')=='1')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('store.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Lis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/homeGrid" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Grid</p>
                </a>
              </li>
              @if(Session::get('status') == 'Superadmin' || Session::get('status') == 'Admin')
              <li class="nav-item">
                <a href="/create/item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Add</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
          @if(Session::get('active')=='2')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('store.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Lis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/homeGrid" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Grid</p>
                </a>
              </li>
              @if(Session::get('status') == 'Superadmin' || Session::get('status') == 'Admin')
              <li class="nav-item">
                <a href="/create/item" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Add</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
        </ul>
      </nav>
	@show
		<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
