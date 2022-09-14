@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('history') }}
@endsection
@section('content')

<div class="container-fluid">
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-4">
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

                <div class="col-sm-5">
                    <div class="form-group"></div>
                </div>
        
                <div class="col-sm-3">
                    <div class="form-group active-status right">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}">
                            <i class="search-icon fas fa-search fa-sm"></i>
                        </div>
                        {{-- <button class="btn btn-primary btn-block">Tìm kiếm</button> --}}
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
                            <th>Tên đăng nhập</th>
                            <th>Thời gian tác động</th>
                            <th>IP thực hiện</th>
                            <th>Thao tác thực hiện</th>
                            <th>&nbsp;</th>
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
    <a href="{{route('service.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm dịch vụ</p>
    </a>
</div>

@endsection