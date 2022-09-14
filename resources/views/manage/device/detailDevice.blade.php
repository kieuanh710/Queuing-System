@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('detailDevice') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
        </div>
        <form action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mã thiết bị:</label>
                            <span> {{$detail->idDevice}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên thiết bị:</label>
                            <span> {{$detail->nameDevice}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ IP: </label>
                            <span> {{$detail->ip_address}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Loại thiết bị: </label>
                            <span> {{$detail->typeDevice}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập: </label>
                            <span> {{$detail->username}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu: </label>
                            <span> {{$detail->password}} </span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Dịch vụ sử dụng: </label>
                            <span>{{$detail->service}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="add">
    <a href="{{route('device.update', ['id'=>$detail->id])}}">
        <i class="fas fa-light fa-pen"></i>
        <p>Cập nhật thiết bị</p>
    </a>
</div>

@endsection