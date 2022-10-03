<!DOCTYPE html>
<html lang="en">

<head>
    @include('manage.layouts.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('manage.layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    @yield('heading')

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Message -->
                        <li class="nav-item navbar-item dropdown no-arrow mx-1">
                            <a class="nav-link navbar-link dropdown-toggle" href="{{route('notify')}}" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-solid fa-bell notify"></i>
                                <!-- Counter - Message -->
                                <!-- <span class="badge badge-danger badge-counter">3+</span> -->
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Thông báo
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"></div>
                                        <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021</div>
                                        <div></div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                        <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                        <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                        <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021</div>
                                    </div>
                                </a>
                                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item navbar-item ">
                            <a href="{{route('info')}}" class="nav-link navbar-link" >
                                <img class="img-profile rounded-circle" src="/assets/img/avatar/{{Auth::user()->avatar}}">

                                <div class="name mr-2 d-none d-lg-inline text-gray-600 small">
                                    <p>Xin chào</p>
                                    {{Auth::user()->name}}
                                </div>
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="list-table">
                    @yield('content')
                </div>

            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('manage.layouts.footer')
    @yield('script')
</body>

</html>