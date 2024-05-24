<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CayCanh :: Administrative</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_assets/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_assets/css/custom.css')}}">
</head>

<body class="hold-transition sidebar-mini d-flex flex-column min-vh-100">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <div class="navbar-nav pl-2">
      </div>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
            <img src="{{asset('assets/uploads/profile/'.$user->avatar)}}" class='img-circle elevation-2' width="40" height="40" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
            <h4 class="h4 mb-0"><strong>{{$user->fullname}}</strong></h4>
            <div class="mb-3">{{$user->email}}</div>
            <div class="dropdown-divider"></div>

            <div class="dropdown-divider"></div>
            <a href="{{route('logout')}}" class="dropdown-item text-danger">
              <i class="fas fa-sign-out-alt mr-2"></i> Đăng Xuất
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{asset('assets/img/logo_web.png')}}" alt="caycanhonline" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">ADMIN</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{route('admin')}}" class="nav-link {{ request()->is('admin') ? 'active-sidebar' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Trang Chủ</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.category')}}" class="nav-link {{ request()->is('admin/category*') ? 'active-sidebar' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Danh Mục</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.product')}}" class="nav-link {{ request()->is('admin/product*') ? 'active-sidebar' : '' }}">
                <i class="nav-icon fas fa-tag"></i>
                <p>Sản Phẩm</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{route('admin.order')}}" class="nav-link {{ request()->is('admin/order*') ? 'active-sidebar' : '' }}">
                <i class="nav-icon fas fa-shopping-bag"></i>
                <p>Đơn Hàng</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.blog')}}" class="nav-link {{ request()->is('admin/blog*') ? 'active-sidebar' : '' }}">
                <i class="nav-icon  far fa-file-alt"></i>
                <p>Bài Viết</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->

    @yield('content')
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin_assets/js/demo.js')}}"></script>
</body>

</html>