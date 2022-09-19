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
            <div id="content" style="display: flex">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        {{ Breadcrumbs::render('home') }}
                    </nav>
                    <h1 class="h3 mb-2 text-gray-800 title">Biểu đồ cấp số</h1>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box">
                                <div class="inner">
                                    {{-- <img src="/assets/img/Group.png" alt=""> --}}
                                    <i class="icon-calendar fas fa-regular fa-calendar"></i>
                                    <p>Số thứ tự đã cấp</p>
                                </div>
                                <div class="icon-heading">
                                    <span>4.222</span>
                                    <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box">
                                <div class="inner">
                                    {{-- <img src="/assets/img/Group.png" alt=""> --}}
                                    <i class="icon-calendar fas fa-regular fa-calendar"></i>
                                    <p>Số thứ tự đã cấp</p>
                                </div>
                                <div class="icon-heading">
                                    <span>4.222</span>
                                    <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box">
                                <div class="inner">
                                    {{-- <img src="/assets/img/Group.png" alt=""> --}}
                                    <i class="icon-calendar fas fa-regular fa-calendar"></i>
                                    <p>Số thứ tự đã cấp</p>
                                </div>
                                <div class="icon-heading">
                                    <span>4.222</span>
                                    <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box">
                                <div class="inner">
                                    {{-- <img src="/assets/img/Group.png" alt=""> --}}
                                    <i class="icon-calendar fas fa-regular fa-calendar"></i>
                                    <p>Số thứ tự đã cấp</p>
                                </div>
                                <div class="icon-heading">
                                    <span>4.222</span>
                                    <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-chart">
                            <div class="cart-chart--heading">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="cart-chart--text">
                                            <span>Bảng thống kê theo ngày</span>
                                            <span>Tháng 11/2022</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="cart-chart--filter">
                                            <span>Xem theo</span>
                                            <select name="" id="">
                                                <option value="day">Ngày</option>
                                                <option value="week">Tuần</option>
                                                <option value="month">Tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <canvas id="lineChart" ></canvas>

                        </div>

                    </div>
                </div>

                <div class="content-heading">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Message -->
                            <li class="nav-item navbar-item dropdown no-arrow mx-1">
                                <a class="nav-link navbar-link dropdown-toggle" href="#" id="alertsDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                            <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                            <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                            <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                            <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Người dùng: Nguyễn Thị Thùy Dung</div>
                                            <div class="small text-gray-500">Thời gian nhận số: 12h20 ngày 30/11/2021
                                            </div>
                                        </div>
                                    </a>
                                    <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
                                </div>
                            </li>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item navbar-item ">
                                <a href="{{route('info')}}" class="nav-link navbar-link" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">

                                    <div class="name mr-2 d-none d-lg-inline text-gray-600 small">
                                        <p>Xin chào</p>
                                        Kieu Anh
                                    </div>
                                </a>
                                <!-- Dropdown - User Information -->
                                <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="detail-info">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Profile
                                            </a>
                                        </div> -->
                            </li>

                        </ul>
                    </nav>
                    <h1 class="h3 mb-2 text-gray-800 title" style="padding-left: 24px">Biểu đồ cấp số</h1>
                    
                    <ul class="menubar-list">
                        <li class="menubar-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="report-num">
                                        <span>54534</span>
                                        <div class="report-num--text">
                                            <span>4323</span>
                                            <p><i class="fas fa-regular fa-desktop"></i>Thiết bị</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="report-num--des">
                                        <div class="report-num--item">
                                            <span>Đang hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                        <div class="report-num--item">
                                            <span>Ngưng hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menubar-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="report-num">
                                        <span>54534</span>
                                        <div class="report-num--text">
                                            <span>4323</span>
                                            <p><i class="fas fa-regular fa-desktop"></i>Thiết bị</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="report-num--des">
                                        <div class="report-num--item">
                                            <span>Đang hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                        <div class="report-num--item">
                                            <span>Ngưng hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menubar-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="report-num">
                                        <span>54534</span>
                                        <div class="report-num--text">
                                            <span>4323</span>
                                            <p><i class="fas fa-regular fa-desktop"></i>Thiết bị</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="report-num--des">
                                        <div class="report-num--item">
                                            <span>Đang hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                        <div class="report-num--item">
                                            <span>Ngưng hoạt động: </span>
                                            <span>3799</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                    {{-- date --}}
                    <section class="ftco-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="calendar calendar-first" id="calendar_first">
                                    <div class="calendar_header">
                                        <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                                         <h2></h2>
                                        <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <hr class="sidebar-divider d-none d-md-block">
                                    <div class="calendar_weekdays"></div>
                                    <div class="calendar_content"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
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

    @include('manage.layouts.footer')
</body>

</html>