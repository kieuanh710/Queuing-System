@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý tài khoản</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin tài khoản</h6>
        </div>
       @include('admin.alert')
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Họ tên *</label>
                            <input type="text" name="idDevice" class="form-control" placeholder="Nhập mã thiết bị" value="{{old('idDevice')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập *</label>
                            <input type="text" name="nameDevice" class="form-control" placeholder="Nhập tên thiết bị" value="{{old('nameDevice')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số điện thoại *</label>
                            <input type="text" name="ip_address" class="form-control" placeholder="Nhập địa chỉ IP" value="{{old('ip_address')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu *</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập tài khoản">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email *</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập tài khoản">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu *</label>
                            <input type="" name="" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Vai trò *</label>
                            <select name="typeDevice" class="form-control">
                                <option selected>Chọn loại thiết bị</option>
                                <option value="Kiosk">Kiosk</option>
                                <option value="Display counter">Display Counter</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tình trạng *</label>
                            <select name="typeDevice" class="form-control">
                                <option selected>Chọn loại thiết bị</option>
                                <option value="Kiosk">Kiosk</option>
                                <option value="Display counter">Display Counter</option>
                            </select>
                        </div>
                    </div>
                    <span class="col">* Là trường thông tin bắt buộc</span>
                </div>
            </div>
            <div class="card-footer">
                {{-- <button type="submit" name="" class="btn btn-primary btn-cancel"> --}}
                    <a href="{{route('account')}}" class="btn btn-primary btn-cancel">
                        <span> Hủy bỏ</span>
                    </a>
                {{-- <button> --}}
                <button type="submit" name="" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>
    </div>
</div>


@endsection