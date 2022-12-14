@extends('manage.layouts.main')
@section('heading')
{{ Breadcrumbs::render('detailService') }}
@endsection
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
                {{-- detail service --}}
                <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mã dịch vụ:</label>
                                    <span>{{$detail->idService}} </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Tên dịch vụ:</label>
                                    <span>{{$detail->nameService}} </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mô tả:</label>
                                    <span>{{$detail->desService}} </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                {{-- boardcasts --}}
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
                                <input type="text" name="start" value="{{$detail->start}}">
                                <span>đến</span>
                                <input type="text" name="end" value="{{$detail->end}}">
                            </div>
                        </div>

                        <div class="checkbox-item">
                            <div class="checkbox-item--first">
                                <span>Prefix:</span>
                            </div>
                            <div class="checkbox-item--last">
                                <input type="text" name="prefix" class="check-input-detail" value="{{$detail->prefix}}" >
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
                                        <select name="status" id="status" class="form-control filter-active">
                                            <div class="filter-active--item">
                                                <option selected="selected" value="0">Tất cả</option>
                                                <option value="1" {{request()->status=='1'?'selected':false}}>
                                                    Đang chờ
                                                </option>
                                                <option value="2" {{request()->status=='2'?'selected':false}}>
                                                    Đã sử dụng
                                                </option>
                                                <option value="3" {{request()->status=='3'?'selected':false}}>
                                                    Bỏ qua
                                                </option>
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
                                                        <span class="filter-title" id="start-p" for="start">Start
                                                            Date</span>
                                                        <i class="fa fa-calendar" id="fa-1"></i>
                                                        <input type="text" id="start"class= "form-control text-left mr-2 date"
                                                            placeholder="dd/mm/yyyy">
                                                    </div>
                                                    <i class="fas fa-solid fa-caret-right"></i>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group active-status">
                                                        <span class="filter-title" id="end-p" for="end">End Date</span>
                                                        <i class="fa fa-calendar" id="fa-1"></i>
                                                        <input type="text" id="end" class="form-control text-left mr-2 date"
                                                            placeholder="dd/mm/yyyy">
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
                                            <input name="search" id="search" placeholder="Nhập từ khóa" class="search">
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
                                    @if(!empty($boardcastList))
                                    @foreach ($boardcastList as $key => $item)
                                    <tr>
                                        <th>{{$item->number}}</th>
                                        <th>
                                            @if ($item->status == 1)
                                            <div class="circle circle-done"></div>
                                            Đang chờ
                                            @elseif ($item->status == 2)
                                            <div class="circle circle-success"></div>
                                            Đã sử dụng
                                            @else
                                            <div class="circle circle-absent"></div>
                                            Bỏ qua
                                            @endif
                                        </th>

                                    </tr>
                                    @endforeach
                                    @endif
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
        <a href="{{route('service.update', ['id'=>$detail->id])}}">
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

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        //getUsers();
        $('#search').on('keyup', function () {
            getBoardCast();
        });
        $('#status').on('change', function () {
            getBoardCast();
        });
        $('#start').on('change', function () {
            getBoardCast();
        });
        $('#end').on('change', function () {
            getBoardCast();
        });
    });

    function getBoardCast() {
        var search = $('#search').val();
        var status = $('#status option:selected').val();
        var start = $('#start').val();
        var end = $('#end').val();

        // alert(status);
        // alert(start);
        // alert(search);

        $.ajax({
            method: 'get',
            url: '{{route('filterGetBC')}}',
            dataType: 'json',
            data: {
                status: status,
                start: start,
                end: end,
                search: search,
            },
            success: function (data) {
                console.log(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function (index, value) {
                    if (value.status == 1) {
                        value.status = "Đang chờ";
                    } else if(value.status == 2){
                        value.status = "Đã sử dụng";
                    }
                    else {
                        value.status = "Bỏ qua";
                    }

                    table =
                        '<tr>\
                        <th>'+ value.number + '</th>\
                        <th>'+ value.status + '</th>\
                        </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }

        });
    };

</script>
@endsection