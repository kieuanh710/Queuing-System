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
                        <select name="service" id="service" class="form-control filter-active">
                            <option selected="selected" value="0">Tất cả</option>
                            @foreach ($serviceList as $list)
                            <option value="{{$list->id}}">{{$list->nameService}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group active-status">
                        <span>Tình trạng</span>
                        <select name="status" id="status" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option selected="selected" value="0">Tất cả</option>
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
                        <select name="source" id="source" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option selected="selected" value="0">Tất cả</option>
                                <option value="1" {{request()->supply=='Kiosk'?'selected':false}}>Kiosk</option>
                                <option value="2" {{request()->supply=='System'?'selected':false}}>Hệ thống</option>
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
                                            <i class="fas fa fa-calendar fa-1" id="fa-1"></i>
                                            <input type="text" id="start" class="form-control text-left mr-2 date"  placeholder="dd/mm/yyyy">
                                        </div>
                                        <i class="fas fa-solid fa-caret-right arrow"></i>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group active-status">
                                            <i class="fas fa fa-calendar fa-1" id="fa-1"></i>
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
                            <input  name="search" id="search" placeholder="Nhập từ khóa" class="search" >
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
                            <th>Hạn sử dụng</th>
                            <th>Trạng thái</th>
                            <th>Nguồn cấp</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($boardcastList))
                            @foreach ($boardcastList as $key => $item)
                                <tr>
                                    <th>{{$item->idBoardCast}}</th>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->nameService}}</th>
                                    <th>{{$item->start_date}}</th>
                                    <th>{{$item->end_date}}</th>
                                    <th>
                                        @if ($item->status == 1)
                                        <div class="circle circle-success"></div>
                                            Đang chờ
                                        @elseif ($item->status == 2)
                                          <div class="circle circle-success"></div>
                                            Đã sử dụng
                                          @else
                                          <div class="circle circle-success"></div>
                                            Bỏ qua
                                        @endif
                                    </th>
                                    <th>{{$item->source}}</th>
                                    <th><a href="{{route('boardcast.detail', ['id'=>$item->id])}}">Chi tiết</a></th>                              
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
        {{$boardcastList->Links()}}
    </div>
</div>
<div class="add">
    <a href="{{route('boardcast.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Cấp số mới</p>
    </a>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        //getUsers();
        $('#search').on('keyup', function () {
            getUsers();
        });
        // $('#service').on('change', function () {
        //     getUsers();
        // });
        // $('#status').on('change', function () {
        //     getUsers();
        // }); 
        // $('#source').on('change', function () {
        //     getUsers();
        // });
        // $('#start').on('change', function () {
        //     getUsers();
        // });
        // $('#end').on('change', function () {
        //     getUsers();
        // });
    });

    function getUsers() {
        var search = $('#search').val();
        // var status = $('#status option:selected').val();
        // var service = $('#service option:selected').val();
        // var source = $('#source option:selected').val();
        // var start = $('#start').val();
        // var end = $('#end').val();

        // alert(search);

        $.ajax({
            method: 'get',
            url: '{{route('filterSearchBoardCast')}}',
            dataType: 'json',
            data: {
                // status: status,
                // service: service,
                // source: source,
                // start: start,
                // end: end,
                search: search,
            },
            success: function (data) {
                console.log(data);
                $('tbody').html(data);
                // var table = '';
                // $('tbody').html('');
                // $.each(data, function (index, value) {
                //     if (value.status == 1) {
                //         value.status = "Đang chờ";
                //     } elseif (value.status == 2) {
                //         value.status = "Đã sử dụng";
                //     } else{
                //         value.status = "Bỏ qua";
                //     }

                //     if (value.source == 1) {
                //         value.source = "Kiosk";
                //     } else{
                //         value.source = "Hệ thống";
                //     }

                //     table =
                //         '<tr>\
                //         <th>'+ value.number + '</th>\
                //         <th>'+ value.name + '</th>\
                //         <th>'+ value.nameService + '</th>\
                //         <th>'+ value.start_date + '</th>\
                //         <th>'+ value.start_date + '</th>\
                //         <th>'+ value.source + '</th>\
                //         <th><a href="{{route('service.update', ['id' => ' + $value -> id + '])}}">Cập nhật</a></th>\
                //         </tr>';
                //     $('tbody').append(table)
                //     // console.log(table);
                // })
            }

        });
    };

</script>
@endsection