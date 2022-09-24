@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('roleList') }}
@endsection
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý vai trò</h1>
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group active-status">
                    </div>
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
                            <th>Tên vai trò</th>
                            {{-- sort by
                            <th><a href="?sort-by=nameDevice&sort-type={{$sortType}}">Tên thiết bị</a></th> --}}
                            <th>Số người dùng</th>
                            <th>Mô tả</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        
                        {{-- @if(!empty($roleList))
                            @foreach ($roleList as $key => $item)
                        <tr>
                           
                            <th>{{$item->nameRole}}</th>
                            @foreach($countList as $count =>$item)

                                <th>{{$item->count}}</th>
                                @endforeach
                            <th>{{$item->desRole}}</th> --}}
                            {{-- <th>{!!$item->active==0?'
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
                                <div id="target" class="collapse">
                                    {{$item->service}}
                                 </div>
                                 @if($item->service > 1){
                                     <a class="" href="#" data-toggle="collapse" data-target="#target">Xem thêm </a>
                                 }
                                 @endif 
                            </th> --}}

                        
                            {{-- <th><a href="{{route('role.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="4">no data</td>
                        </tr>
                        @endif --}}
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
    <a href="{{route('role.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm vai trò</p>
    </a>
</div>

@endsection