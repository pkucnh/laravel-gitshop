<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('product/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('login/css/error.css')}}">
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/logout')}}" class="nav-link">logout</a>
        </li> -->
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
  
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('shop/images/logo/logo.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('shop/images/logo/logo.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}" role="button">Thoát
          <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('/admin')}}" class="brand-link">
        <img src="{{asset('shop/images/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>Trang quản trị</strong></span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img onerror="this.src='{{asset('user/images/user.png')}}'" src="{{asset('user/images')}}/{{ Auth::user()->img }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            {{-- <a href="#" class="d-block">{{Session('admin_name')}}</a> --}}
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
  
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                  <a href="{{url('/dashboard')}}" class="nav-link bg-success">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Thống kê
                      {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                  </a>
                </li>
        @if(auth()->user()->level == 1 or auth()->user()->level == 8)
        <li class="nav-header">Nhân sự</li>
          {{-- Quản lý nhân sự --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Quản lý nhân sự
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
           
                <li class="nav-item">
                  <a href="{{route('user.add')}}" class="nav-link">    <i class="nav-icon far fa-plus-square"></i>
                    {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('user.index')}}" class="nav-link">    
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Quán lý nhân sự</p>
                  </a>
                </li>
              
              </ul>
        </li>
        @endif
        {{-- {{session('admin_name')}}3 --}}

        @if(auth()->user()->level == 2 or auth()->user()->level == 8)
        <li class="nav-header">Danh mục</li>
          {{-- Quản lý sản phẩm --}}
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Quản lý danh mục
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('menu.add')}}" class="nav-link">    <i class="nav-icon far fa-plus-square"></i>
                  {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                  <p>Thêm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('menu.index')}}" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>Quản lý danh muc</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-header">Sản phẩm</li>
            {{-- Quản lý sản phẩm --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Quản lý sản phẩm
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('product.add')}}" class="nav-link">    <i class="nav-icon far fa-plus-square"></i>
                    {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('product.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Quản lý sản phẩm</p>
                  </a>
                </li>
              </ul>
          </li>
        
        <li class="nav-header">Loại sản phẩm</li>
            {{-- Quản lýloại sản phẩm --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                  Quản lý loại
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('category.add')}}" class="nav-link"><i class="nav-icon far fa-plus-square"></i>
                    {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('category.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Quản lý loại sản phẩm</p>
                  </a>
                </li>
              </ul>
        </li>
        @endif


        @if(auth()->user()->level == 3 or auth()->user()->level == 8)
        <li class="nav-header">Giảm giá</li>
          {{-- Quản lý mã giảm giá --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-gift"></i>
                <p>
                  Quản lý mã giảm giá
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('coupon.add')}}" class="nav-link">    <i class="nav-icon far fa-plus-square"></i>
                    {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('coupon.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Quản lý mã giảm giá</p>
                  </a>
                </li>
              </ul>
        </li>
        @endif


        @if(auth()->user()->level == 4 or auth()->user()->level == 8)
        <li class="nav-header">Vận chuyển</li>
            {{-- Quản lý phí vận chuyển --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ship"></i>
                <p>
                  Quản lý phí vận chuyển
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/feeship/add-feeship')}}"  class="nav-link">    <i class="nav-icon far fa-plus-square"></i>
                    {{-- <i class="nav-icon far fa-plus-square"></i> --}}
                    <p>Thêm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('feeship.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Quản lý phí vận chuyện</p>
                  </a>
                </li>
              </ul>
        </li>
        @endif


        @if(auth()->user()->level == 5 or auth()->user()->level == 8)
        <li class="nav-header">Đơn hàng</li>
            {{-- // Quản lý đơn hàng --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Quản lý đơn hàng
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('order.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Kiểm duyệt dơn hàng</p>
                  </a>
                </li>
              </ul>
        </li>
        @endif
        
        @if(auth()->user()->level == 6 or auth()->user()->level == 8)
        <li class="nav-header">Bình luận</li>
            {{-- // Quản lý đơn hàng --}}
            <li class="nav-item">
              <a href="{{route('comment.index')}}" class="nav-link">
                <i class="nav-icon fas fa-comment"></i>
                <p>
                  Quản lý bình luận
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('comment.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Kiểm duyệt bình luận</p>
                  </a>
                </li>
              </ul>
        </li>
        @endif

        @if( auth()->user()->level == 8)
      
        <li class="nav-header">Phân quyền</li>
        {{-- // Quản lý đơn hàng --}}
        <li class="nav-item">
          <a href="{{url('level/index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Quản lý phân quyền
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('level/index')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>Phân quyền nhân sự</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
            {{-- <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendar
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>
           
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Pages
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/invoice.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Invoice</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/profile.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/e-commerce.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>E-commerce</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/projects.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Projects</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project-add.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project-edit.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Edit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project-detail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Detail</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/contacts.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/faq.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/contact-us.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact us</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Extras
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Login & Register v1
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/examples/login.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/register.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/forgot-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/recover-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v1</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Login & Register v2
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/examples/login-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/register-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/recover-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v2</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Legacy User Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/language-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Language Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/blank.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blank Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="starter.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Starter Page</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                  Search
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/search/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Search</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/search/enhanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Enhanced</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
              <a href="iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Tabbed IFrame Plugin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Documentation</p>
              </a>
            </li>  
          </ul> --}}
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>