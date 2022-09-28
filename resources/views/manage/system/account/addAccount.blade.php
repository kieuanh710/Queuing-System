@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('addAccount') }}
@endsection
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
                            <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập *</label>
                            <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập" value="{{old('username')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số điện thoại *</label>
                            <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{old('phone')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu *</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email *</label>
                            <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu *</label>
                            <input type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Vai trò *</label>
                            <select name="role" id="role" class="form-control filter-active">
                                @foreach ($roleList as $list)
                                    <option value="{{$list->id}}">{{$list->nameRole}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tình trạng *</label>
                            <select name="active" class="form-control filter-active" >
                                <div class="filter-active--item">
                                    <option value="0">Tất cả</option>
                                    <option value="active" {{request()->active=='active'?'selected':false}}>Hoạt động</option>
                                    <option value="inactive" {{request()->active=='inactive'?'selected':false}}>Ngừng hoạt động</option>
                                </div>
                            </select>
                        </div>
                    </div>
                    <span class="col">* Là trường thông tin bắt buộc</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('account')}}" class="btn btn-primary btn-cancel">
                    <span> Hủy bỏ</span>
                </a>
                <button type="submit" name="" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>
    </div>
</div>


@endsection