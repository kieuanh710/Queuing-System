@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="height: 604px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
        </div>
        <form action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Họ tên:</label>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nguồn cấp:</label>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên dịch vụ: </label>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Trạng thái: </label>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số thứ tự: </label>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số điện thoại: </label>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Thời gian cấp: </label>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ Email: </label>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Hạn sử dụng: </label>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="add">
    <a href="#">
        <i class="fas fa-light fa-pen"></i>
        <p>Quay lại</p>
    </a>
</div>

@endsection