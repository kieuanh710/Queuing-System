@extends('manage.layouts.main')

@section('heading')
    {{ Breadcrumbs::render('deviceList') }}
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Danh sách thiết bị</h1>
    <form action="" method="GET">
        <div class="filter" id="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status" id="accordion">
                        <span>Trạng thái hoạt động</span>
                        <select name="active" id="active" class="form-control filter-active" >
                            <option selected="selected" value="0">Tất cả</option>
                            <option value="1" {{request()->active=='1'?'selected':false}}>Hoạt động</option>
                            <option value="2" {{request()->active=='2'?'selected':false}}>Ngừng hoạt động</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Trạng thái kết nối</span>
                        <select name="connect" id="connect" class="form-control filter-active">
                            <option value="0" selected="selected" >Tất cả</option>
                            <option value="1" {{request()->connect=='1'?'selected':false}}>Kết nối</option>
                            <option value="2" {{request()->connect=='2'?'selected':false}}>Mất kết nối</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group"></div>
                </div>
        
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            <input name="search" id="search" placeholder="Nhập từ khóa" class="search">
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
                            <th>Mã thiết bị</th>
                            {{-- sort by
                            <th><a href="?sort-by=nameDevice&sort-type={{$sortType}}">Tên thiết bị</a></th> --}}
                            <th>Tên thiết bị</th>
                            <th>Địa chỉ Ip</th>
                            <th>Trạng thái hoạt động</th>
                            <th>Trạng thái kết nối</th>
                            <th>Dịch vụ sử dụng</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($deviceList))
                            @foreach ($deviceList as $key => $item)
                        <tr>
                            <th>{{$item->idDevice}}</th>
                            <th>{{$item->nameDevice}}</th>
                            <th>{{$item->ip_address}}</th>
                            <th>{!!$item->active==2?'
                                <div class="circle circle-error"></div>
                                    Ngưng hoạt động
                                '
                                :
                                '<div class="circle circle-success"></div>
                                    Hoạt động'!!}
                            </th>
                            <th>{!!$item->connect==2?'
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
                                 @endif --}}
                            </th>

                            <th><a href="{{route('device.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('device.update', ['id'=>$item->id])}}">Cập nhật</a></th>
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
    </div>
    <div class="d-flex justify-content-end">
        {{$deviceList->Links()}}
    </div>
</div>
<div class="add">
    <a href="{{route('device.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm thiết bị</p>
    </a>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        //getUsers();
        $('#search').on('keyup', function() {
            getUsers();
        });
        $('#filter').on('change', function() {
            getUsers();
        });
        $('#active').on('change', function() {
            getUsers();
        });
        $('#connect').on('change', function() {
            getUsers();
        });
    });
    function getUsers(){
        var search = $('#search').val();
        var active = $('#active option:selected').val();
        var connect = $('#connect option:selected').val();
        // alert(active);
        // alert(connect);
        //alert(search);

        $.ajax({
            method:'get',
            url:'{{route('filterSearchDevice')}}',
            dataType: 'json',
            data:{
                active:active,
                connect:connect,
                search:search,
            },
            success:function(data){
                console.log(data);
                $('tbody').html(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function(index, value){
                    if(value.active==1){
                        value.active = "Hoạt động";
                    } else{
                        value.active = "Ngưng hoạt động";
                    }
                    if(value.connect==1){
                        value.connect = "Kết nối";
                    } else{
                        value.connect = "Mất kết nối";
                    }
                
                    table = 
                    '<tr>\
                        <th>'+value.idDevice+'</th>\
                        <th>'+value.nameDevice+'</th>\
                        <th>'+value.ip_address+'</th>\
                        <th>'+value.active+'</th>\
                        <th>'+value.connect+'</th>\
                        <th>'+value.service+'</th>\
                        <th>'+'<a href="{{route('device.detail', ['id'=>$item->id])}}">'+'Chi tiết</a>'+'</th>\
                        <th>'+'<a href="{{route('device.update', ['id'=>$item->id])}}">'+'Cập nhật</a>'+'</th>\
                        </tr>';

                    $('tbody').append(table)
                    // console.log(table);
                })
            }

        });
    };

</script>
@endsection