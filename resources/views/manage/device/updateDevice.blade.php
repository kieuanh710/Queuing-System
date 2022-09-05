@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
        </div>
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mã thiết bị </label>
                            <input type="text" name="id" class="form-control" placeholder="Nhập mã thiết bị">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên thiết bị</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên thiết bị">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ IP</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập địa chỉ IP">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Loại thiết bị</label>
                            <input type="text" class="form-control" placeholder="Chọn loại thiết bị">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" class="form-control" placeholder="Nhập tài khoản">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="text" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Dịch vụ sử dụng</label>
                            <input type="text" class="form-control last" placeholder="Nhập dịch vụ sử dụng">
                        </div>
                    </div>
                    <span>* Là trường thông tin bắt buộc</span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="" class="btn btn-primary btn-cancel">Hủy bỏ</button>
                <button type="submit" name="" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>


@endsection