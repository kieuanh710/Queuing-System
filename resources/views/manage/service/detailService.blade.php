@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý thiết bị</h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin thiết bị</h6>
                </div>
                <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mã dịch vụ:</label>
                                    <span> </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Tên dịch vụ:</label>
                                    <span> </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mô tả:</label>
                                    <span> </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quy tắc cấp số</h6>
                </div>
                <div class="card-body">
                    <div class="checkbox">
                        <div class="checkbox-item">
                            <div class="checkbox-item--first">
                                <span>Tăng tự động:</span>
                            </div>
                            <div class="checkbox-item--last">
                                <input type="text" name="">
                                <span>đến</span>
                                <input type="text" name="">
                            </div>
                        </div>
    
                        <div class="checkbox-item">
                            <div class="checkbox-item--first">
                                <span>Prefix:</span>
                            </div>
                            <div class="checkbox-item--last">
                                <input type="text" name="" class="check-input-detail">
                            </div>
                        </div>
                        <div class="checkbox-item">
                            <div class="checkbox-item--first">
                                <span>Reset mỗi ngày</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="filter">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group active-status">
                                        <span class="filter-title">Trạng thái hoạt động</span>
                                        <select name="active" class="form-control filter-active">
                                            <div class="filter-active--item">
                                                <option value="0">Tất cả</option>
                                                <option value="accomplished" {{request()->active=='active'?'selected':false}}>Đã hoàn thành</option>
                                                <option value="active" {{request()->active=='inactive'?'selected':false}}>Đã thực hiện</option>
                                                <option value="absent" {{request()->active=='inactive'?'selected':false}}>Vắng</option>
                                            </div>
                                        </select>
                                        
                                    </div>
                                </div>
                                   
                                <div class="col-sm-5">
                                    <form autocomplete="off">
                                        <div class="input-daterange">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group active-status">
                                                        <span class="filter-title" id="start-p" for="start">Start Date</span>
                                                        <i class="fa fa-calendar" id="fa-1"></i>
                                                        <input type="text" id="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                                    </div>
                                                    <i class="fas fa-solid fa-caret-right"></i>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group active-status">
                                                        <span class="filter-title" id="end-p" for="end">End Date</span>
                                                        <i class="fa fa-calendar" id="fa-1"></i>
                                                        <input type="text" id="end" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>                       
                            
                                <div class="col-sm-4">
                                    <div class="form-group active-status right">
                                        <span class="filter-title">Từ khóa</span>
                                        <div class="search-btn">
                                            <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}">
                                            <i class="search-icon fas fa-search fa-sm"></i>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </form>
    
                   
                        <div class="card-body main">
                            @include('admin.alert')
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Trạng thái</th>
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
                </div>
            </div>
            
        </div>
        
    </div>
    <div class="button-link">
        <div class="add">
            <a href="{{route('service.update')}}">
                <i class="fas fa-light fa-pen"></i>
                <p>Cập nhật danh sách</p>
            </a>
        </div>
        <div class="return">
            <a href="{{route('service')}}">
                <i class="fas fa-solid fa-rotate-left"></i>
                <p>Quay lại</p>
            </a>
        </div>
    </div>
@endsection