@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('addDevice') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
        </div>
       @include('admin.alert')
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mã thiết bị *</label>
                            <input type="text" name="idDevice" class="form-control" placeholder="Nhập mã thiết bị" value="{{old('idDevice')}}">
                            {{-- @error('idDevice')
                                <span style="color:red">{{$message}}</span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên thiết bị *</label>
                            <input type="text" name="nameDevice" class="form-control" placeholder="Nhập tên thiết bị" value="{{old('nameDevice')}}">
                        
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ IP *</label>
                            <input type="text" name="ip_address" class="form-control" placeholder="Nhập địa chỉ IP" value="{{old('ip_address')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Loại thiết bị *</label>
                            <select name="typeDevice" class="form-control">
                                <option value="Kiosk">Kiosk</option>
                                <option value="Display counter">Display Counter</option>
                            </select>
                              
                        {{-- <input type="text" name="typeDevice" class="form-control" placeholder="Chọn loại thiết bị"> --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập *</label>
                            <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mật khẩu *</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  class="form-label select-label" for="">Dịch vụ sử dụng *</label>
                            
                            <select name="service" id="select" class="select form-control filter-active" >
                                @foreach ($serviceList as $list)
                                <option selected="selected" value="{{$list->nameService}}">{{$list->nameService}}</option>
                                <label for="{{$list->id}}">{{$list->nameService}}</label>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <span class="col">* Là trường thông tin bắt buộc</span>
                </div>
            </div>
            <div class="card-footer">
                {{-- <button type="submit" name="" class="btn btn-primary btn-cancel"> --}}
                    <a href="{{route('device')}}" class="btn btn-primary btn-cancel">
                        <span> Hủy bỏ</span>
                    </a>
                {{-- <button> --}}
                <button type="submit" name="" class="btn btn-primary">Thêm thiết bị</button>
            </div>
            @csrf
        </form>
    </div>
</div>


@endsection