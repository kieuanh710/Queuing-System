@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('detailBoardCast') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý cấp số</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="height: 604px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin cấp số</h6>
        </div>
        <form action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Họ tên:</label>
                            <span>{{$detail->name}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nguồn cấp:</label>
                            <span> @if ($detail->source == 1) Kiosk
                                @else Hệ thống
                                @endif</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên dịch vụ: </label>
                            <span>{{$detail->nameService}}  </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Trạng thái: </label>
                            <span>@if ($detail->status == 1)
                                    Đang chờ
                                @elseif ($detail->status == 2)
                                    Đã sử dụng
                                  @else
                                    Bỏ qua
                                @endif</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số thứ tự: </label>
                            <span>{{$detail->number}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Số điện thoại: </label>
                            <span>{{$detail->phone}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Thời gian cấp: </label>
                            <span>{{$detail->start_date}} </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Địa chỉ Email: </label>
                            <span>{{$detail->email}}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Hạn sử dụng: </label>
                            <span>{{$detail->end_date}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="add">
    <a href="{{route('boardcast')}}">
        <i class="fas fa-light fa-pen"></i>
        <p>Quay lại</p>
    </a>
</div>

@endsection