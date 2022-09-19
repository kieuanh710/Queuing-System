@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('history') }}
@endsection
@section('content')

<div class="container-fluid">
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-4">
                    <form autocomplete="off" method="post" action="{{route('search')}}">
                        <div class="form-group active-status">
                            <span>Chọn thời gian</span>
                            <div class="input-daterange">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group active-status">
                                            <i class="fa fa-calendar calendar" id="fa-1"></i>
                                            <input type="text" id="start" name="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                        </div>
                                        <i class="fas fa-solid fa-caret-right arrow"></i>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group active-status">
                                            <i class="fa fa-calendar calendar" id="fa-1"></i>
                                            <input type="text" id="end" name="end" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    {{-- <button class="btn btn-primary btn-block">Tìm kiếm</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>        

                <div class="col-sm-5">
                    <div class="form-group"></div>
                </div>
        
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            {{-- <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}"> --}}
                            <input name="search" id="search" placeholder="Nhập từ khóa" class="search">
                            <i class="search-icon fas fa-search fa-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-body main">
            @include('admin.alert')
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th>Thời gian tác động</th>
                            <th>IP thực hiện</th>
                            <th>Thao tác thực hiện</th>
                           
                        </tr>
                    </thead>

                    <tbody> 
                        @if($logs->count())
                        @foreach($logs as $key => $log)
                            <tr>
                                <td>{{ $log->username }}</td>
                                <td>{{ $log->method }}</td>
                                <td>{{ $log->ip }}</td>
                                <td>{{ $log->subject }}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-end">
        {{$historyList->Links()}}
    </div>
</div>      
@endsection