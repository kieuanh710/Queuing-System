@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('boardcastList') }}
@endsection
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý cấp số</h1>
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group active-status">
                        <span>Tên dịch vụ</span>
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
                <div class="col-sm-2">
                    <div class="form-group active-status">
                        <span>Tình trạng</span>
                        <select name="status" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="1" {{request()->status=='1'?'selected':false}}>Đang chờ</option>
                                <option value="2" {{request()->status=='2'?'selected':false}}>Đã sử dụng</option>
                                <option value="3" {{request()->status=='3'?'selected':false}}>Bỏ qua</option>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group active-status">
                        <span>Nguồn cấp</span>
                        <select name="supply" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="Kiosk" {{request()->supply=='Kiosk'?'selected':false}}>Kiosk</option>
                                <option value="System" {{request()->supply=='System'?'selected':false}}>Hệ thống</option>
                            </div>
                        </select>
                    </div>
                </div>
               
                <div class="col-sm-3">
                    <form autocomplete="off">
                        <div class="form-group active-status">
                            <span>Chọn thời gian</span>
                            <div class="input-daterange">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group active-status">
                                            <i class="fa fa-calendar calendar" id="fa-1"></i>
                                            <input type="text" id="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                        </div>
                                        <i class="fas fa-solid fa-caret-right arrow"></i>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group active-status">
                                            <i class="fa fa-calendar calendar" id="fa-1"></i>
                                            <input type="text" id="end" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>          

                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}">
                            <i class="search-icon fas fa-search fa-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-body main">
            @include('admin.alert')
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            {{-- sort by
                            <th><a href="?sort-by=nameDevice&sort-type={{$sortType}}">Tên thiết bị</a></th> --}}
                            <th>Tên khách hàng</th>
                            <th>Tên dịch vụ</th>
                            <th>Thời gian cấp</th>
                            <th>hạn sử dụngs</th>
                            <th>Trạng thái</th>
                            <th>Nguồn cấp</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        {{-- @if(!empty($serviceList))
                            @foreach ($serviceList as $key => $item)
                        <tr>
                            <th>{{$item->idDevice}}</th>
                            <th>{{$item->nameDevice}}</th>
                            <th>{{$item->ip_address}}</th>
                            <th>{!!$item->active==0?'
                                <div class="circle circle-error"></div>
                                    Ngưng hoạt động
                                '
                                :'<div class="circle circle-success"></div>
                                    Hoạt động'!!}
                            </th>
                            <th>{!!$item->connect==0?'
                                <div class="circle circle-error"></div>
                                    Mất kết nối
                                '
                                :'<div class="circle circle-success"></div>
                                    Kết nối'!!}
                            </th>
                            <th>
                                {{$item->service}}
                                {{-- <div id="target" class="collapse">
                                    {{$item->service}}
                                 </div>
                                 @if($item->service > 1){
                                     <a class="" href="#" data-toggle="collapse" data-target="#target">Xem thêm </a>
                                 }
                                 @endif 
                            </th>

                            <th><a href="{{route('service.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('service.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="4">no data</td>
                        </tr>
                        @endif--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="d-flex justify-content-end">
        {{$deviceList->Links()}}
    </div> --}}
</div>
<div class="add">
    <a href="{{route('boardcast.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Cấp số mới</p>
    </a>
</div>

@endsection