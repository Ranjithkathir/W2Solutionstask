<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--Bootsrap 4 -->
        <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('public/assets/css/sb-admin-2.min.css')}}">
        <script src="{{url('public/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('public/assets/js/popper.min.js')}}"></script>
        <script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="{{url('public/assets/fontawesome/css/all.css')}}">
        @yield('head')
        <style>
            .sidebar-bg{
                background-color: #078282FF;
                /* background-image: linear-gradient(180deg,#858796 10%,#60616f 100%); */
                background-size: cover;
            }
            .navbar-bg, .footer-bg{
                background-color: #1cabab;
                background-size: cover;
            }
            #load{
                width:100%;
                height:100%;
                position:fixed;
                z-index:9999;
                background:url("{{URL::to('/')}}/public/assets/images/loader.gif") no-repeat center center rgba(0,0,0,0.25);
            }
        </style>
</head>
<body id="page-top">
    <!-- <div id="load"></div> -->
    <div id="wrapper">
        @include('layouts.sidebar.sidebar1')

        <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light navbar-bg topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fas fa-bars" style="color:#fff;"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 text-light small" style="font-weight:900;">Hi {{ ucfirst(Auth()->user()->name) }} <i class="fas fa-list"></i></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer navbar-bg">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span class="text-light">Copyright &copy; W2Solutions task 2021</span>
                    </div>
                </div>
            </footer>
      <!-- End of Footer -->
        </div>

    </div>

        <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">If you logged out means current session will be an end to era.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('public/assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{url('public/assets/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript">
        document.onreadystatechange = function () {
            var state = document.readyState
            if (state == 'complete') {
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";
            }
        }
    </script>
</body>
    @yield('foot')
</html>