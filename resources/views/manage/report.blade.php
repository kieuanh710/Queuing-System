@extends('manage.layouts.main')
@section('content')

<div class="container-fluid">
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-3">
                    <form autocomplete="off">
                        <span>Chọn thời gian</span>
                                <div class="input-daterange">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group active-status">
                                                {{-- <span  id="start-p" for="start">Chọn thời gian</span> --}}
                                                <i class="fa fa-calendar calendar" id="fa-1"></i>
                                                <input type="text" id="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                            </div>
                                            <i class="fas fa-solid fa-caret-right arrow"></i>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group active-status">
                                                    {{-- <span id="end-p" for="end">End Date</span> --}}
                                                    {{-- <i class="fas fa-light fa-calendar-days" id="fa-1"></i> --}}
                                                    <i class="fa fa-calendar calendar" id="fa-1"></i>
                                                    <input type="text" id="end" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                        </form>
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
                            <th>Tên dịch vụ</th>
                            <th>Thời gian cấp</th>
                            <th>Tình trạng</th>
                            <th>Nguồn cấp</th>
                        </tr>
                    </thead>

                    <tbody> 
                        {{-- @if(!empty($deviceList))
                            @foreach ($deviceList as $key => $item)
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

                            <th><a href="{{route('device.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('device.update', ['id'=>$item->id])}}">Cập nhật</a></th>
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
        {{$reportList->Links()}}
    </div> --}}
</div>
<div class="save add">
    <a href="#">
        <i class="fas fa-solid fa-file-arrow-down"></i>
        <p>Tải về</p>
    </a>
</div>

@endsection