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
                    {{-- <div class="card bg-gradient-success">
                        <div class="card-body pt-0">

                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Month"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Month">September 2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Month"></span></th>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="08/28/2022"
                                                                    class="day old weekend">28</td>
                                                                <td data-action="selectDay" data-day="08/29/2022"
                                                                    class="day old">29</td>
                                                                <td data-action="selectDay" data-day="08/30/2022"
                                                                    class="day old">30</td>
                                                                <td data-action="selectDay" data-day="08/31/2022"
                                                                    class="day old">31</td>
                                                                <td data-action="selectDay" data-day="09/01/2022"
                                                                    class="day">1</td>
                                                                <td data-action="selectDay" data-day="09/02/2022"
                                                                    class="day">2</td>
                                                                <td data-action="selectDay" data-day="09/03/2022"
                                                                    class="day weekend">3</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/04/2022"
                                                                    class="day weekend">4</td>
                                                                <td data-action="selectDay" data-day="09/05/2022"
                                                                    class="day">5</td>
                                                                <td data-action="selectDay" data-day="09/06/2022"
                                                                    class="day">6</td>
                                                                <td data-action="selectDay" data-day="09/07/2022"
                                                                    class="day">7</td>
                                                                <td data-action="selectDay" data-day="09/08/2022"
                                                                    class="day">8</td>
                                                                <td data-action="selectDay" data-day="09/09/2022"
                                                                    class="day">9</td>
                                                                <td data-action="selectDay" data-day="09/10/2022"
                                                                    class="day weekend">10</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/11/2022"
                                                                    class="day weekend">11</td>
                                                                <td data-action="selectDay" data-day="09/12/2022"
                                                                    class="day">12</td>
                                                                <td data-action="selectDay" data-day="09/13/2022"
                                                                    class="day">13</td>
                                                                <td data-action="selectDay" data-day="09/14/2022"
                                                                    class="day">14</td>
                                                                <td data-action="selectDay" data-day="09/15/2022"
                                                                    class="day active today">15</td>
                                                                <td data-action="selectDay" data-day="09/16/2022"
                                                                    class="day">16</td>
                                                                <td data-action="selectDay" data-day="09/17/2022"
                                                                    class="day weekend">17</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/18/2022"
                                                                    class="day weekend">18</td>
                                                                <td data-action="selectDay" data-day="09/19/2022"
                                                                    class="day">19</td>
                                                                <td data-action="selectDay" data-day="09/20/2022"
                                                                    class="day">20</td>
                                                                <td data-action="selectDay" data-day="09/21/2022"
                                                                    class="day">21</td>
                                                                <td data-action="selectDay" data-day="09/22/2022"
                                                                    class="day">22</td>
                                                                <td data-action="selectDay" data-day="09/23/2022"
                                                                    class="day">23</td>
                                                                <td data-action="selectDay" data-day="09/24/2022"
                                                                    class="day weekend">24</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/25/2022"
                                                                    class="day weekend">25</td>
                                                                <td data-action="selectDay" data-day="09/26/2022"
                                                                    class="day">26</td>
                                                                <td data-action="selectDay" data-day="09/27/2022"
                                                                    class="day">27</td>
                                                                <td data-action="selectDay" data-day="09/28/2022"
                                                                    class="day">28</td>
                                                                <td data-action="selectDay" data-day="09/29/2022"
                                                                    class="day">29</td>
                                                                <td data-action="selectDay" data-day="09/30/2022"
                                                                    class="day">30</td>
                                                                <td data-action="selectDay" data-day="10/01/2022"
                                                                    class="day new weekend">1</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="10/02/2022"
                                                                    class="day new weekend">2</td>
                                                                <td data-action="selectDay" data-day="10/03/2022"
                                                                    class="day new">3</td>
                                                                <td data-action="selectDay" data-day="10/04/2022"
                                                                    class="day new">4</td>
                                                                <td data-action="selectDay" data-day="10/05/2022"
                                                                    class="day new">5</td>
                                                                <td data-action="selectDay" data-day="10/06/2022"
                                                                    class="day new">6</td>
                                                                <td data-action="selectDay" data-day="10/07/2022"
                                                                    class="day new">7</td>
                                                                <td data-action="selectDay" data-day="10/08/2022"
                                                                    class="day new weekend">8</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Dec</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div> --}}
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