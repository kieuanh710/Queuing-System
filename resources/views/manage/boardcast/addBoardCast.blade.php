@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('addBoardCast') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý dịch vụ</h1>
    <div class="card shadow mb-4" style="height: 604px">
        <div class="card-header py-3" style="padding: 1.5rem 1.25rem">
            <h6 class="m-0 font-weight-bold text-primary" style="text-align:center; font-size:32px">Cấp số mới</h6>
        </div>
       @include('admin.alert')
       <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group active-status boardcast">
                        <span>Dịch vụ khách hàng lựa chọn</span>
                        <select name="service" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="1" {{request()->service=='1'?'selected':false}}>Khám sản - Phụ khoa</option>
                                <option value="2" {{request()->service=='2'?'selected':false}}>Khám răng hàm mặt</option>
                                <option value="3" {{request()->service=='3'?'selected':false}}>khám tai mũi họng</option>
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            @csrf
            <div class="footer">
                <a href="{{route('boardcast')}}" class="btn btn-primary btn-cancel">
                    <span> Hủy bỏ</span>
                </a>
                <button type="submit" name="" class="btn btn-primary">In số</button>
            </div>
        </form>
    </div>
</div>

<div class="pop-up">
    <div class="pop-up--container">
        <div class="pop-up--content">
            <h6>Số thứ tự được cấp</h6>
            <span>safdfsd</span>
            <p>DV:Khám răng hàm mặt (Tại quầy số 1)</p>

        </div>
    </div>
    <div class="pop-up--footer">
        <div class="pop-up--item">
            <div class="pop-up--text">
                <span>Thời gian cấp: </span>
            </div>
            <div class="pop-up--time">
                <span>đến</span>
            </div>
        </div>
        <div class="pop-up--item">
            <div class="pop-up--text">
                <span>Hạn sử dụng: </span>
            </div>
            <div class="pop-up--expiry">
                <span>đến</span>
            </div>
        </div>
    </div>
</div>
@endsection