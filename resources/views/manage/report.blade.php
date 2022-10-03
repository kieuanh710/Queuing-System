@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('reportList') }}
@endsection
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
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><a class="sortby" href="?sortby=number&sorttype={{$sortType}}">Số thứ tự</a></th>
                            <th><a class="sortby" href="?sortby=nameService&sorttype={{$sortType}}">Tên dịch vụ</th>
                            <th><a class="sortby" href="?sortby=start_date&sorttype={{$sortType}}">Thời gian cấp</a></th>
                            <th><a class="sortby" href="?sortby=status&sorttype={{$sortType}}">Tình trạng</a></th>
                            <th><a class="sortby" href="?sortby=source&sorttype={{$sortType}}">Nguồn cấp</a></th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($boardcastList))
                            @foreach ($boardcastList as $key => $item)
                                <tr>
                                    <th>{{$item->number}}</th>
                                    <th>{{$item->nameService}}</th>
                                    <th>{{$item->created_at}}</th>
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
                                    <th>
                                        @if ($item->source == 1)
                                            Kiosk
                                          @else
                                            Hệ thống
                                        @endif
                                    </th>
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
<div class="save add">
    <a href="{{route('export')}}">
        <i class="fas fa-solid fa-file-arrow-down"></i>
        <p>Tải về</p>
    </a>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#start').on('change', function () {
            getUsers();
        });
        $('#end').on('change', function () {
            getUsers();
        });
        $('#end').on('change', function () {
            getUsers();
        });
    });

    function getUsers() {
        var start = $('#start').val();
        var end = $('#end').val();
      
        // alert(start);

        $.ajax({
            method: 'get',
            url: '{{route('filterSearchReport')}}',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function (data) {
                console.log(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function (index, value) {
                    if(value.status==1){
                        value.status= "Đang chờ";
                    }else if(value.status==2){
                        value.status = "Đã sử dụng";
                    }else{
                        value.status = "Bỏ qua";
                    }

                    if(value.source==1){
                        value.source = "Kiosk";
                    } else{
                        value.source = "Hệ thống";
                    }
                    table =
                        '<tr>\
                        <th>'+ value.number + '</th>\
                        <th>'+ value.nameService + '</th>\
                        <th>'+ value.created_at + '</th>\
                        <th>'+ value.status + '</th>\
                        <th>'+ value.source + '</th>\
                        </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }

        });
    };
</script>
@endsection