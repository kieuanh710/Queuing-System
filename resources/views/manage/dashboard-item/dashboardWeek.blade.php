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
                <div class="container-fluid" style="display: flex; padding-right: 0 !important">
                    <div class="content-right">
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                            {{ Breadcrumbs::render('home') }}
                        </nav>
                        <h1 class="h3 mb-2 text-gray-800 title">Biểu đồ cấp số</h1>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div href="{{route('boardcast')}}" class="small-box">
                                    <div class="inner">
                                        {{-- <img src="/assets/img/Group.png" alt=""> --}}
                                        {{-- <i class="icon-calendar fas fa-regular fa-calendar"></i> --}}
                                        <img src="/assets/img/capso.png" alt="">
                                        <p>Số thứ tự đã cấp</p>
                                    </div>
                                    <div class="icon-heading">
                                        <span>{{$total}}</span>
                                        <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box">
                                    <div class="inner">
                                        <img src="/assets/img/capso1.png" alt="">
                                        <p>Số thứ tự đã dùng</p>
                                    </div>
                                    <div class="icon-heading">
                                        <span>{{$totalUsing}}</span>
                                        <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box">
                                    <div class="inner">
                                        <img src="/assets/img/capso2.png" alt="">
                                        <p>Số thứ tự đang chờ</p>
                                    </div>
                                    <div class="icon-heading">
                                        <span>{{$totalWait}}</span>
                                        <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box">
                                    <div class="inner">
                                        <img src="/assets/img/capso3.png" alt="">
                                        <p>Số thứ tự đã bỏ qua</p>
                                    </div>
                                    <div class="icon-heading">
                                        <span>{{$totalPass}}</span>
                                        <p><i class="fas fa-sharp fa-solid fa-up"></i>32.41%</p>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        {{-- line chart --}}
                        <div class="card active" >
                            <div class="card-chart">
                                <div class="cart-chart--heading">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="cart-chart--text">
                                                <span>Bảng thống kê theo tuần</span>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="cart-chart--filter">
                                                <span>Xem theo</span>
                                                <div class="select-option">
                                                    <div class="dropdown day-select" id="dropdown">
                                                        <input type="text" name="day-status" id="day-status" placeholder="Ngày" readonly>
                                                        <div class="option day-status">
                                                            <div class="option-item" onclick="chooseOption('day-status', 0)">
                                                                <a href="{{route('admin')}}">Ngày</a>
                                                            </div>
                                                            <div class="option-item active" onclick="chooseOption('day-status', 1)">
                                                                <a href="{{route('week')}}">Tuần</a>
                                                            </div>
                                                            <div class="option-item" onclick="chooseOption('day-status', 2)">
                                                                <a href="{{route('month')}}">Tháng</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    {{-- Thong bao --}}
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
                        <h1 class="h3 mb-2 text-gray-800 title" style="padding-left: 24px">Biểu đồ cấp số</h1>
                        {{-- donut chart --}}
                        <ul class="menubar-list">
                            <li class="menubar-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="report-num">
                                            <canvas id="myPieChart" style="max-width:60px;height:100%;position: absolute;
                                            left: 20px; top:5px">
                                            </canvas>
                                            <div class="percent">
                                            <?php
                                                if ($totalActiveDV + $totalInactiveDV !== 0) {
                                                    $percent = 0 ? 0 : ($totalActiveDV * 100 / $totalDevice);
                                                    echo round($percent)."%";
                                                } else{
                                                    echo "0%";
                                                }
                                            ?></div>
                                            <div class="report-num--text">
                                                <span>{{$totalDevice}}</span>
                                                <p><img src="/assets/img/monitor.png" alt="">Thiết bị</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="report-num--des">
                                            <div class="report-num--item">
                                                <span>Đang hoạt động: </span>
                                                <span class="numbDV">{{$totalActiveDV}}</span>
                                            </div>
                                            <div class="report-num--item">
                                                <span>Ngưng hoạt động: </span>
                                                <span class="numbDV">{{$totalInactiveDV}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menubar-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="report-num">
                                            <canvas id="myPieChartService" style="max-width:60px;height:100%;position: absolute;
                                            left: 20px; top:5px">
                                            </canvas>
                                            <div class="percent">
                                            <?php
                                                if ($totalActiveSV + $totalInactiveSV !== 0) {
                                                    $percent = 0 ? 0 : ($totalActiveSV * 100 / $totalService);
                                                    echo round($percent)."%";
                                                } else{
                                                    echo "0%";
                                                }
                                            ?></div>
                                            <div class="report-num--text">
                                                <span>{{$totalService}}</span>
                                                <p style="color: #4277FF;"><img src="/assets/img/Frame 332.png" alt="">Dịch vụ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="report-num--des">
                                            <div class="report-num--item">
                                                <span>Đang hoạt động: </span>
                                                <span class="numbSV">{{$totalActiveSV}}</span>
                                            </div>
                                            <div class="report-num--item">
                                                <span>Ngưng hoạt động: </span>
                                                <span class="numbSV">{{$totalInactiveSV}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menubar-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="report-num">
                                            <canvas id="myPieChartBoardCast" style="max-width:60px;height:100%;position: absolute;
                                            left: 20px; top:5px">
                                            </canvas>
                                            <div class="percent">
                                            <?php
                                                if ($totalUsing + $totalWait + $totalPass !== 0) {
                                                    $percent = 0 ? 0 : ($totalUsing * 100 / $total);
                                                    echo round($percent)."%";
                                                } else{
                                                    echo "0%";
                                                }
                                            ?></div>
                                            <div class="report-num--text">
                                                <span>{{$total}}</span>
                                                <p style="color:#35C75A;"><img src="/assets/img/icon.png" alt="">Cấp số</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="report-num--des">
                                            <div class="report-num--item">
                                                <span>Đã sử dụng: </span>
                                                <span class="numbBC">{{$totalUsing}}</span>
                                            </div>
                                            <div class="report-num--item">
                                                <span>Đang chờ: </span>
                                                <span class="numbBC" >{{$totalWait}}</span>
                                            </div>
                                            <div class="report-num--item">
                                                <span>Bỏ qua: </span>
                                                <span class="numbBC">{{$totalPass}}</span>
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

    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('manage.layouts.footer')
    
    <script type="text/javascript">
        $(document).ready(function(){
            var y_data = JSON.parse('{!! json_encode($weeks)!!}'); 
            var x_data = JSON.parse('{!! json_encode($weekCount)!!}');  

            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: y_data,
                datasets: [{
                //   label: "My First dataset",
                data: x_data,
                backgroundColor: [
                    'rgb(211, 224, 255)',
                ],
                borderColor: [
                    'rgb(103, 149, 248)',
                ],
                borderWidth: 2
                },
                ]
            },
            options: {
                responsive: true
            }
            });
        });
    </script>



     {{-- myPieChart Device --}}
     <script type="text/javascript">
        $(document).ready(function(){
            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Active", "Inactive"],
                    datasets: [{
                        data: [<?php echo $totalActiveDV?>, <?php echo $totalInactiveDV?>],
                        backgroundColor: ['#ff7506', '#EAEAEC'],
                    }],
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },

                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    },
                    legend: {
                    display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        });
     </script>

    {{-- myPieChart Service --}}
    <script type="text/javascript">
        $(document).ready(function(){
            // Pie Chart Example
            var ctx = document.getElementById("myPieChartService");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Active", "Inactive"],
                    datasets: [{
                        data: [<?php echo $totalActiveSV?>, <?php echo $totalInactiveSV?>],
                        backgroundColor: ['#4277FF', '#EAEAEC'],
                    }],
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },

                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    },
                    legend: {
                    display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        });
   </script>

     {{-- myPieChart BoardCast --}}
    <script type="text/javascript">
        $(document).ready(function(){
            // Pie Chart Example
            var ctx = document.getElementById("myPieChartBoardCast");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Đã sử dụng", "Đang chờ", "Bỏ qua"],
                    datasets: [{
                        data: [<?php echo $totalUsing?>, <?php echo $totalWait?>,<?php echo $totalInactiveSV?>],
                        backgroundColor: ['#35C75A', '#EAEAEC'],
                    }],
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },

                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        font: 2
                    },
                    legend: {
                        display: false
                    },
                    
                    // độ dày viền
                    cutoutPercentage: 80,
                },
            });
        });
     </script>

 
 
</body>

</html>