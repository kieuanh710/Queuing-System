@extends('manage.main')
@section('content')
<h1 class="h3 mb-2 text-gray-800 title">Danh sách thiết bị</h1>
<div class="filter">
    <div class="active sm-12 md-6">
        <span>Trạng thái hoạt động</span>
        <select name="" id="" class="filter-active">
            <div class="filter-active--item">
                <option value="all">Tất cả</option>
                <option value="connect">Kết nối</option>
                <option value="disconnect">Mất kết nối</option>
            </div>
        </select>
    </div>
    <div class="active sm-12 md-6">
        <span>Trạng thái hoạt động</span>
        <select name="" id="" class="filter-active">
            <div class="filter-active--item">
                <option value="all">Tất cả</option>
                <option value="connect">Kết nối</option>
                <option value="disconnect">Mất kết nối</option>
            </div>
        </select>
    </div>

    <div class="active right sm-12 md-6">
        <span>Trạng thái hoạt động</span>
        <select name="" id="" class="filter-active">
            <div class="filter-active--item">
                <option value="all">Tất cả</option>
                <option value="connect">Kết nối</option>
                <option value="disconnect">Mất kết nối</option>
            </div>
        </select>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td><a href="#">Chi tiết</a></td>
                        <td><a href="#">Cập nhật</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="add">
    
</div>
@endsection