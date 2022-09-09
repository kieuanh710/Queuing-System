@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- @if(session('error'))
                    <div class="alert alert-error">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error">
                        {{session('error')}}
                    </div>
                @endif -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="" alt="Avata">
                        <span>Ten nguoi dung</span>
                    </div>

                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Tên người dùng </label>
                                    <input type="text" name="idDevice" class="form-control-info"
                                        placeholder="Nhập mã thiết bị">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Tên đăng nhập</label>
                                    <input type="text" name="nameDevice" class="form-control-info"
                                        placeholder="Nhập tên thiết bị">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="ip_address" class="form-control-info"
                                        placeholder="Nhập địa chỉ IP">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Mật khẩu</label>
                                    <input type="text" name="typeDevice" class="form-control-info"
                                        placeholder="Chọn loại thiết bị">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="username" class="form-control-info"
                                        placeholder="Nhập tài khoản">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Vai trò</label>
                                    <input type="text" name="password" class="form-control-info" placeholder="Nhập mật khẩu">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            @csrf
        </form>
    </div>
</div>
@endsection