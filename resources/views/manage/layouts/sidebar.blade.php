<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-text mx-3">
            <img src="/assets/img/Logo alta.png" alt="Alta" class="logo">
        </div>
    </a>

    <!-- Divider -->
    <li class="nav-item link">
        <a class="nav-link" href="{{route('admin')}}">
            <img src="/assets/img/element-4.png" alt="" class="icon">
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item link ">
        <a class="nav-link" href="{{route('device')}}">
            <i class="icon fas fa-light fa-desktop"></i>
            {{-- <img src="/assets/img/monitor.png" alt="" class="icon"> --}}
            <span>Thiết bị</span>
        </a>
    </li>
    <li class="nav-item link ">
        <a class="nav-link" href="{{route('service')}}">
            <img src="/assets/img/service.png" alt="" class="icon"> 
            <span>Dịch vụ</span>
        </a>
    </li>
    <li class="nav-item link">
        <a class="nav-link" href="{{route('boardcast')}}">
            <img src="/assets/img/boardcast.png" alt="" class="icon">
            <span>Cấp số</span>
        </a>
    </li>
    <li class="nav-item link ">
        <a class="nav-link" href="{{route('report')}}">
            <img src="/assets/img/report.png" alt="" class="icon">
            <span>Báo cáo</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <img src="/assets/img/setting.png" alt="" class="icon">
            <span>Cài đặt hệ thống</span>
            <i class="setting fas fa-solid fa-ellipsis-vertical"></i>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white collapse-inner">
                <a class="collapse-item" href="{{route('role')}}">Quản lý vai trò</a>
                <a class="collapse-item" href="{{route('account')}}">Quản lý tài khoản</a>
                <a class="collapse-item" href="{{route('history')}}">Nhật kí người dùng</a>
            </div>
        </div>
    </li>
    
    <a href="{{route('logout')}}" type="submit" name="" class="logout ">
        <div class="btn-logout">
            <img src="/assets/img/fi_log-out.png" alt="">
            <span>Đăng xuất</span>
        </div>
    </a>
</ul>


