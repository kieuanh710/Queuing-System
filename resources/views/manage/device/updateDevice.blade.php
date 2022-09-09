@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
        </div>
        @include('admin.alert')
        <form action="{{route('device.postUpdate')}}" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mã thiết bị *</label>
                            <input type="text" name="idDevice" class="form-control" placeholder="Nhập mã thiết bị" value="{{old('idDevice') ?? $deviceDetail->idDevice}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên thiết bị *</label>
                            <input type="text" name="nameDevice" class="form-control" placeholder="Nhập tên thiết bị" value="{{old('nameDevice') ?? $deviceDetail->nameDevice}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ IP *</label>
                            <input type="text" name="ip_address" class="form-control" placeholder="Nhập địa chỉ IP" value="{{old('ip_address') ?? $deviceDetail->ip_address}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Loại thiết bị *</label>
                            <select name="typeDevice" class="form-control">
                                <option selected>Chọn loại thiết bị</option>
                                <option value="{{old('typeDevice') ?? $deviceDetail->typeDevice}}">Kiosk</option>
                                <option value="{{old('typeDevice') ?? $deviceDetail->typeDevice}}">Display Counter</option>
                            </select>
                            {{-- <label for="">Loại thiết bị</label>
                            <input type="text" name="typeDevice" class="form-control" placeholder="Chọn loại thiết bị" value="{{old('typeDevice') ?? $deviceDetail->typeDevice}}"> --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập *</label>
                            <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản" value="{{old('username') ?? $deviceDetail->username}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu *</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" value="{{old('password') ?? $deviceDetail->password}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Dịch vụ sử dụng *</label>
                            <input type="text" name="service" class="form-control last" placeholder="Nhập dịch vụ sử dụng" value="{{old('service') ?? $deviceDetail->service}}">
                        </div>
                    </div>
                    <span class="col">* Là trường thông tin bắt buộc</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('device')}}" class="btn btn-primary btn-cancel">
                    <span> Hủy bỏ</span>
                </a>
                <button type="submit" name="" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>
    </div>
</div>


@endsection