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
                        @if(!empty($boardcastList))
                            @foreach ($boardcastList as $key => $item)
                                <tr>
                                    <th>{{$item->idBoardCast}}</th>
                                    <th>{{$item->nameService}}</th>
                                    <th></th>
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
    });

    function getUsers() {
        var start = $('#start').val();
        var end = $('#end').val();

        // alert(active);
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
                        <th>'+ value.idBoardCast + '</th>\
                        <th>'+ value.nameService + '</th>\
                        <th></th>\
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