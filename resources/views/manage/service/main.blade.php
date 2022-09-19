@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('serviceList') }}
@endsection
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Danh sách dịch vụ</h1>

    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Trạng thái hoạt động</span>
                        <select name="active" class="form-control filter-active" >
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="active" {{request()->active=='active'?'selected':false}}>Hoạt động</option>
                                <option value="inactive" {{request()->active=='inactive'?'selected':false}}>Ngừng hoạt động</option>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form autocomplete="off">
                                <div class="input-daterange">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group active-status">
                                                <span  id="start-p" for="start">Start Date</span>
                                                <i class="fa fa-calendar" id="fa-1"></i>
                                                <input type="text" id="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
    
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group active-status">
                                                    <span id="end-p" for="end">End Date</span>
                                                  
                                                    <i class="fa fa-calendar" id="fa-1"></i>
                                                    <input type="text" id="end" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                        </form>
                    
                </div>        

                <div class="col-sm-2">
                    <div class="form-group"></div>
                </div>
        
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            <input type="search" name="keyword" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}">
                            <i class="search-icon fas fa-search fa-sm"></i>
                        </div>
                        <button class="btn btn-primary btn-block">Tìm kiếm</button>
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
                            <th>Mã dịch vụ</th>
                            {{-- sort by
                            <th><a href="?sort-by=nameDevice&sort-type={{$sortType}}">Tên thiết bị</a></th> --}}
                            <th>Tên dịch vụ</th>
                            <th>Mô tả</th>
                            <th>Trạng thái hoạt động</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($serviceList))
                            @foreach ($serviceList as $key => $item)
                        <tr>
                            <th>{{$item->idService}}</th>
                            <th>{{$item->nameService}}</th>
                            <th>{{$item->desService}}</th>
                            <th></th>
                            {{-- <th>{!!$item->active==0?'
                                <div class="circle circle-error"></div>
                                    Ngưng hoạt động
                                '
                                :'<div class="circle circle-success"></div>
                                    Hoạt động'!!}
                            </th> --}}

                            <th><a href="{{route('service.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('service.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="4">no data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Pagination --}}
        
        {{-- <div class="pagition">
            <ul class="pagination" id="dataTable_paginate">
                <li class="page-item  disabled" id="dataTable_previous">
                    <i class="page-link fas fa-solid fa-caret-left"></i>
                </li>
                <li class="paginate_button page-item active">
                <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item" id="dataTable_next">
                    <i class="page-link fas fa-solid fa-caret-right"></i>
                </li>
            </ul>
        </div>
    --}}
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