@extends('manage.layouts.main')

@section('heading')
{{ Breadcrumbs::render('serviceList') }}
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Danh sách dịch vụ</h1>
    {{-- filter --}}
    <form action="" method="GET">
        <div class="filter" id="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Trạng thái hoạt động</span>
                        <select name="active" id="active" class="form-control filter-active">
                            <div class="filter-active--item">
                                <option value="0">Tất cả</option>
                                <option value="1" {{request()->active=='1'?'selected':false}}>Hoạt động</option>
                                <option value="2" {{request()->active=='2'?'selected':false}}>Ngừng hoạt động</option>
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
                                        <span id="start-p" for="start">Start Date</span>
                                        <i class="fa fa-calendar" id="fa-1"></i>
                                        <input type="text" name="start" id="start" class="form-control text-left mr-2 date"
                                            placeholder="dd/mm/yyyy">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group active-status">
                                        <span id="end-p" for="end">End Date</span>

                                        <i class="fa fa-calendar" id="fa-1"></i>
                                        <input type="text" name="end" id="end" class="form-control text-left mr-2 date"
                                            placeholder="dd/mm/yyyy">
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
                            <th>{!!$item->active==2?'
                                <div class="circle circle-error"></div>
                                Ngưng hoạt động
                                '
                                :'<div class="circle circle-success"></div>
                                Hoạt động'!!}
                            </th>

                            <th><a href="{{route('service.detail', ['id'=>$item->id])}}">Chi tiết</a></th>
                            <th><a href="{{route('service.update', ['id'=>$item->id])}}">Cập nhật</a></th>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">Dữ liệu không tồn tại</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{$serviceList->Links()}}
    </div>
</div>
<div class="add">
    <a href="{{route('service.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm dịch vụ</p>
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
        
        $('#active').on('change', function () {
            getUsers();
        });
        $('#start').on('change', function () {
            getUsers();
        });
        $('#end').on('change', function () {
            getUsers();
        });
    });

    function getUsers() {
        var search = $('#search').val();
        var active = $('#active option:selected').val();
        var start = $('#start').val();
        var end = $('#end').val();

        // alert(active);
        // alert(start);
        // alert(search);

        $.ajax({
            method: 'get',
            url: '{{route('filterSearchService')}}',
            dataType: 'json',
            data: {
                active: active,
                start: start,
                end: end,
                search: search,
            },
            success: function (data) {
                console.log(data);
                $('tbody').html(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function (index, value) {
                    if (value.active == 1) {
                        value.active = "Hoạt động";
                    } else {
                        value.active = "Ngưng hoạt động";
                    }

                    table =
                        '<tr>\
                        <th>'+ value.idService + '</th>\
                        <th>'+ value.nameService + '</th>\
                        <th>'+ value.desService + '</th>\
                        <th>'+ value.active + '</th>\
                        <th>'+'<a href="/admin/manage/service/detail?id='+ value.id + '">'+'Chi tiết</a>'+'</th>\
                        <th>'+'<a href="/admin/manage/service/update/'+ value.id + '">'+'Cập nhật</a>'+'</th>\
                        </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }

        });
    };

</script>
@endsection