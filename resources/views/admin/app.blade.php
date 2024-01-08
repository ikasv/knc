<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/jqvmap/jqvmap.min.css"> -->

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>

    * {
      font-family: "Source Sans Pro";
      font-size: 15px;
      -webkit-font-smoothing: antialiased;
      letter-spacing: 0.5px;
    }

    li.nav-item.active a,
    li.nav-item.active a:hover {
      color: #000 !important;
    }

    input[type="file"] {
      padding: 3px;
    }

    .form-img {
      border: 1px solid #eee;
      height: 100px;
      width: 100px;
      object-fit: cover;
      margin-top: 15px;
    }

    .gallery-images {
      margin-top: 15px;
    }

    .gallery-image-box {
      margin-right: 15px;
      display: inline-block;
      height: 110px;
      width: 110px;
      border: 1px solid #eee;
      text-align: center;
      position: relative;
      padding-top: 4px;
    }

    .gallery-img {
      height: 100px;
      width: 100px;
      object-fit: cover;
    }

    .gallery-image-close {
      position: absolute;
      top: 5px;
      right: 5px;
      color: red;
      cursor: pointer;
    }

    #purchase_items th,
    #purchase_items td {
      padding: 18px 12px;
      font-size: 13px;
      text-align: center;
    }

    ul.nav.nav-treeview {
      background: #fff;
    }

    ul.nav.nav-treeview a {
      color: #000 !important;
    }

    ul.nav.nav-treeview a:hover {
      background: #c6eaff !important;
    }

    .child-nav-treeview {
      background: #f3ffe0 !important;
    }

    li.nav-item.menu-is-opening.menu-open {
      background: #79c2ed;
    }

    li.nav-item.menu-is-opening.menu-open>a {
      color: #000 !important;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-treeview {
      background-color: #fff;
    }

    li.nav-item.active {
      background: #ccecff;
    }

    li.nav-item.menu-is-opening.menu-open .menu-open {
      background: #d7f7a5;
    }

    span.select2-selection.select2-selection--single {
      height: 40px;
    }

    i.fa.fa-plus:hover {
      color: orange;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #87c8ef;
      border: 1px solid #87c8ef;
      padding: 0 8px 0 28px;
      margin-top: 2px;
    }

    .select2-selection--multiple {
      overflow: hidden !important;
      height: auto !important;
    }

    .remove-clone-template-row {
      position: absolute;
      top: 12px;
      right: 10px;
      background: red;
      color: #fff;
      padding: 8px;
      border-radius: 50%;
      font-size: 12px;
      cursor: pointer;
      z-index: 9;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0;
    }

    .user-panel .image{ align-self: center; }
    
    .f-12{ font-size: 12px; }
    .f-13{ font-size: 13px; }
    .f-14{ font-size: 14px; }

  </style>

  @yield("style")
  @yield("component-style")
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('admin-assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <form action="{{ url('admin/logout') }}" method="post">
            @csrf
            <button class="bg-transparent border-0" title="Logout">
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </form>
        </li>

        <?php if (0) { ?>
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
                  <img src="{{ asset('admin-assets') }}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
                  <img src="{{ asset('admin-assets') }}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                  <img src="{{ asset('admin-assets') }}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>

        <?php } ?>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('') }}" class="brand-link">
        <img src="{{ asset('admin-assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $sitesetting_details->site_name }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 mb-2 d-flex" style="border: none;">
          <div class="image">
            <img src="{{ asset('admin-assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth('admin')->user()->name }} <br> (<small class="text-success"> {{ auth('admin')->user()->role_type }} </small>)</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{url('admin')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            @can('admin')
            <li class="nav-item {{ request()->segment(2) == 'roles' || request()->segment(2) == 'modules'
                              ? 'menu-is-opening menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                  Permissions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">


                @can('permissions', ['roles', 'view'])
                <li class="nav-item {{ request()->segment(2) == 'roles' ? 'active' : '' }}">
                  <a href="{{ url('admin/roles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                @endif

                @can('permissions', ['modules', 'view'])
                <li class="nav-item {{ request()->segment(2) == 'modules' ? 'active' : '' }}">
                  <a href="{{ route('admin::modules.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modules</p>
                  </a>
                </li>
                @endif

              </ul>
            </li>
            @endcan


            @if(isset($permissions['tags']) && $permissions['tags']['rr_view']==1 )
            <li class="nav-item">
              <a href="{{ url('admin/tags') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  Tags
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(isset($permissions['tags']) && $permissions['tags']['rr_view']==1)
                <li class="nav-item">
                  <a href="{{ url('admin/tags') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tag List</p>
                  </a>
                </li>
                @endif
                @if(isset($permissions['tags']) && $permissions['tags']['rr_create']==1)
                <li class="nav-item">
                  <a href="{{ url('admin/tags/create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
            @endif


            @can('permissions', ['sliders', 'view'])
            <li class="nav-item">
              <a href="{{ url('admin/sliders') }}" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>
                  Sliders
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('permissions', ['sliders', 'view'])
                <li class="nav-item">
                  <a href="{{ url('admin/sliders') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider List</p>
                  </a>
                </li>
                @endcan
                @can('permissions', ['sliders', 'create'])
                <li class="nav-item">
                  <a href="{{ url('admin/sliders/create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan

            <!-- Store Management -->
            @can('permissions', ['store', 'view'])
            <li class="nav-item {{ request()->segment(2) == 'categories' || request()->segment(2) == 'products' ? 'menu-is-opening menu-open' : '' }}">
              <a href="{{ url('admin/sliders') }}" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Store
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- Categories -->
                @can('permissions', ['categories', 'view'])
                <li class="nav-item">
                  <a href="{{ route('admin::categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p> Categories</p>
                  </a>
                </li>
                @endcan
                <!-- Categories -->

                <!-- Product -->
                @can('permissions', ['products', 'view'])
                <li class="nav-item">
                  <a href="{{ route('admin::products.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Products</p>
                  </a>
                </li>
                @endcan
                <!-- End Product Packages -->

              </ul>
            </li>
            @endcan
            <!-- End Store Management -->

            <!-- Sales Executive -->
            @can('permissions', ['sales-executive', 'view'])
            <li class="nav-item">
              <a href="{{ route('admin::sales-executive.index') }}" class="nav-link">
                <i class="fas fa-user-tie nav-icon"></i>
                <p>Sales Executive</p>
              </a>
            </li>
            @endcan
            <!-- End Sales Executive -->

            <!-- Dealers -->
            @can('permissions', ['dealers', 'view'])
            <li class="nav-item">
              <a href="{{ route('admin::dealers.index') }}" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Dealers</p>
              </a>
            </li>
            @endcan
            <!-- End Dealers -->

            <!-- User -->
            @can('permissions', ['users', 'view'])
            <li class="nav-item">
              <a href="{{ url('admin/users') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Customers</p>
              </a>
            </li>
            @endcan
            <!-- End User -->

            <!-- Demo -->
            @can('permissions', ['demo', 'view'])
            <li class="nav-item">
              <a href="{{ route('admin::demo.index') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Demo</p>
              </a>
            </li>
            @endcan
            <!-- End Demo -->


            @can('site_settings')
            <li class="nav-item">
              <a href="{{url('admin/sitesettings')}}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>Settings</p>
              </a>
            </li>
            @endcan

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      @yield("content")

    </div>
    <!-- /.content-wrapper -->


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('admin-assets') }}/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('admin-assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin-assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Select2 -->
  <script src="{{ asset('admin-assets') }}/plugins/select2/js/select2.full.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('admin-assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

  <script src="{{ asset('admin-assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- ChartJS -->
  <script src="{{ asset('admin-assets') }}/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <!-- <script src="{{ asset('admin-assets') }}/plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="{{ asset('admin-assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin-assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin-assets') }}/plugins/moment/moment.min.js"></script>
  <script src="{{ asset('admin-assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('admin-assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{ asset('admin-assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin-assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin-assets') }}/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin-assets') }}/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('admin-assets') }}/dist/js/pages/dashboard.js"></script>

  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

  <script>
    //  ********* Validations
    $(document).on('change', 'input[type="text"]', function() {
      if (/^\s/.test($(this).val()))
        $(this).val('');
    });

    /******************************* Numbers Only *******************************/

    jQuery.fn.ForceNumericOnly = function() {
      return this.each(function() {
        $(this).keydown(function(e) {
          var key = e.charCode || e.keyCode || 0;
          // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
          // home, end, period, and numpad decimal
          return (key == 8 || key == 9 || key == 13 || key == 46 || key == 110 || /*key == 190 ||*/ (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        });
      });
    };

    //==> Add class to form input 

    $(".numberOnly").ForceNumericOnly();

    //==> End  

    /******************************* End Numbers Only *******************************/

    /******************************* Aplha Only *******************************/

    $('.alphaOnly').bind('keyup blur', function() {
      var node = $(this);
      node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
    });

    /******************************* End Aplha Only *******************************/
    //  ********* End Validations

    // Get Cities
    function getCities(state_id) {
      $.ajax({
        type: "get",
        url: "{{ url('getCities') }}",
        dataType: 'json',
        data: {
          "_token": "{{ csrf_token() }}",
          state_id: state_id
        },
        success: function(data) {
          console.log(data);
          if (data.status) {
            $('#cities').html(data.cities);
          } else {
            $('#cities').html('');
          }
        },
        error: function() {
          alert('Some Error Occured.');
        }
      });
    }
    // End Get Cities

    // End Get Localities
    function getLocalities(city_id) {
      $.ajax({
        type: "get",
        url: "{{ url('getLocalities') }}",
        dataType: 'json',
        data: {
          "_token": "{{ csrf_token() }}",
          city_id: city_id
        },
        success: function(data) {
          console.log(data);
          if (data.status) {
            $('#locality').html(data.localities);
          } else {
            $('#locality').html('');
          }
        },
        error: function() {
          alert('Some Error Occured.');
        }
      });
    }
    // End Get Localities

    // Add More

    function removeCloneTemplateRow(el) {
      $(el).parents('.clone-template').remove();

      $.each($('.itinerary'), function(i){
        var key = i + 1;
        $(this).find('#day').val(key);
        $(this).attr('data-clone-template-id', key)
      });
    }

    var remove_combo_btn_html = '';
    var clone_template_id = 0;

    function add_more(e, type, parent_class) {

      var clone_template = $(e).parents(parent_class).find('.clone-template');
      var last_clone_template_id = clone_template.last().attr('data-clone-template-id');
      var dublicate_clone_template = clone_template.first().clone();

      next_clone_template_id = parseInt(last_clone_template_id) + 1;
      html_remove_current_clone_template_btn = '<span class="remove-clone-template-row fa fa-trash" onclick="removeCloneTemplateRow(this)"></span>';

      modifyCloneTemplate(dublicate_clone_template, next_clone_template_id, type);

      dublicate_clone_template.append(html_remove_current_clone_template_btn);
      clone_template.last().after(dublicate_clone_template);
    }

    function modifyCloneTemplate(dublicate_clone_template, clone_template_id, type) {

      dublicate_clone_template.attr('data-clone-template-id', clone_template_id);
      dublicate_clone_template.find('input[name="product_id"]').remove();
      dublicate_clone_template.find('span.text-danger').html('');

      switch (type) {
        case 'safety_advices':
          dublicate_clone_template.find('#title').attr('name', "safety_advices[" + clone_template_id + "][title]").val('');
          dublicate_clone_template.find('#caution').attr('name', "safety_advices[" + clone_template_id + "][caution]").val('');
          dublicate_clone_template.find('#highlight').attr('name', "safety_advices[" + clone_template_id + "][highlight]").val('');
          dublicate_clone_template.find('#description').attr('name', "safety_advices[" + clone_template_id + "][description]").val('');
          break;

        case 'gallery_images':
          dublicate_clone_template.find('.image').attr('name', "gallery_images[" + clone_template_id + "][image]").val('');
          dublicate_clone_template.find('.alt').attr('name', "gallery_images[" + clone_template_id + "][alt]").val('');
          dublicate_clone_template.find('img').remove();
          dublicate_clone_template.find('.old_image').remove();
          break;

        case 'faq':
          dublicate_clone_template.find('#question').attr('name', "faq[" + clone_template_id + "][question]").val('');
          dublicate_clone_template.find('#answer').attr('name', "faq[" + clone_template_id + "][answer]").val('');
          break;

        case 'dynamic-content':
          dublicate_clone_template.find('#heading').attr('name', "dynamic_content[" + clone_template_id + "][heading]").val('');
          dublicate_clone_template.find('#description').attr('id', 'description_' + clone_template_id).attr('name', "dynamic_content[" + clone_template_id + "][description]").val('');
          dublicate_clone_template.find('#cke_description').remove();

          setTimeout(() => {
            CKEDITOR.replace('description_' + clone_template_id);
          }, 100);
          break;

        case 'itinerary':
          dublicate_clone_template.find('#day').attr('name', "itinerary[" + clone_template_id + "][day]").val(clone_template_id);
          dublicate_clone_template.find('#title').attr('name', "itinerary[" + clone_template_id + "][title]").val('');
          dublicate_clone_template.find('.itinerary_description').attr('id', 'itinerary_description_'+ clone_template_id).attr('name', "itinerary[" + clone_template_id + "][description]").val('');
          dublicate_clone_template.find('#cke_itinerary_description').remove();
          
          setTimeout(() => {
            CKEDITOR.replace('itinerary_description_' + clone_template_id);
          }, 100);

          break;
      }

    }

    // End Add More

    //  Slug
    $(".slug").keyup(function() {
      var Text = $(this).val();
      var slug = Text.toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');

      $(".set-slug").val(slug);
    });
    //  End Slug

    $('.select2').select2({
      placeholder: "Choose..."
    });

    // Delete
    $(document).on('click', '.delete-btn', function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value == 1) {
          var id = $(this).data('id');
          var type = $(this).data('type');

          delete_url = `{{ url('admin') }}/${type}/${id}`;

          deleteRowAjax(delete_url, this, id = '');
        }
      });
    });

    function deleteRowAjax(delete_url, row, id) {
      $.ajax({
        url: delete_url,
        type: 'delete',
        data: {
          "id": id,
          "_token": "{{ csrf_token() }}"
        },
        beforeSend: function() {

        },
        success: function(res) {
          if (res.status) {

            $(row).parent().parent().remove();
            Swal.fire(
              'Deleted!',
              res.message,
              'success'
            );
          } else {
            Swal.fire(
              'Error!',
              res.message,
              'error'
            );
          }
        },
        error: function() {
          Swal.fire(
            'Error!',
            'Some error occured.',
            'error'
          );
        }
      });
    }
    // End Delete
  </script>


  @yield("content_js")
  @yield("script")
  @yield("component-script")

</body>

</html>