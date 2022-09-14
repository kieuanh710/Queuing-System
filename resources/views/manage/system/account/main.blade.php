@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('accountList') }}
@endsection
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Danh sách tài khoản</h1>
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Tên vai trò</span>
                        <select name="active" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="active" {{request()->active=='active'?'selected':false}}>Admin</option>
                                <option value="inactive" {{request()->active=='inactive'?'selected':false}}>Kế toán</option>
                            </div>
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
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
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái hoạt động</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($accountList))
                            @foreach ($accountList as $key => $item)
                        <tr>
                            <th>{{$item->username}}</th>
                            <th>{{$item->name}}</th>
                            <th>{{$item->phone}}</th>
                            <th>{{$item->email}}</th>
                            <th>{{$item->nameRule}}</th>
                            <th>{!!$item->active==0?'
                                <div class="circle circle-error"></div>
                                    Ngưng hoạt động
                                '
                                :'<div class="circle circle-success"></div>
                                    Hoạt động'!!}
                            </th>
                           
                            <th><a href="{{route('account.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                           
                        </tr>
                        @endforeach
                        @endif
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
    <a href="{{route('account.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm tài khoản</p>
    </a>
</div>

@endsection