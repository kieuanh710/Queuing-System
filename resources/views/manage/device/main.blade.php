@extends('manage.layouts.main')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Danh sách thiết bị</h1>

    <div class="filter">
        <div class="active-status">
            <span>Trạng thái hoạt động</span>
            <select name="active" class="filter-active">
                <div class="filter-active--item">
                    <option value="0">Tất cả</option>
                    <option value="connect">Hoạt động</option>
                    <option value="disconnect">Ngừng hoạt động</option>
                </div>
            </select>
        </div>
        <div class="active-status">
            <span>Trạng thái kết nối</span>
            <select name="connect" class="filter-active">
                <div class="filter-active--item">
                    <option value="0">Tất cả</option>
                    <option value="connect">Kết nối</option>
                    <option value="disconnect">Mất kết nối</option>
                </div>
            </select>
        </div>

        <div class="active-status right">
            <span>Từ khóa</span>
            <div class="search-btn">
                <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search">
                <button class="btn btn-primary btn-block">Tìm kiếm</button>
                    <i class="search-icon fas fa-search fa-sm"></i>
            </div>
        </div>
    </div>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Địa chỉ Ip</th>
                            <th>Trạng thái hoạt động</th>
                            <th>Trạng thái kết nối</th>
                            <th>Dịch vụ sử dụng</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($deviceList))
                            @foreach ($deviceList as $key => $item)
                        <tr>
                            <th>{{$item->idDevice}}</th>
                            <th>{{$item->nameDevice}}</th>
                            <th>{{$item->ip_address}}</th>
                            <th>Trạng thái hoạt động</th>
                            <th>Trạng thái kết nối</th>
                            <th>{{$item->service}}</th>
                            <th><a href="{{route('device.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('device.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="4">no data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagition">
            <ul class="pagination" id="dataTable_paginate">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                    <i class="page-link fas fa-solid fa-caret-left"></i>
                </li>
                <li class="paginate_button page-item active">
                <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item" id="dataTable_next">
                    <i class="page-link fas fa-solid fa-caret-right"></i>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="add">
    <a href="{{route('device.add')}}">
        <i class="fa-light fa-square-plus"></i>
        <p>Thêm thiết bị</p>
    </a>
</div>

@endsection