@extends('manage.layouts.main')
@section('heading')
{{ Breadcrumbs::render('addBoardCast') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý dịch vụ</h1>
    {{-- <form action="{{route('boardcast.postAdd')}}" method="post"> --}}

        <div class="card shadow mb-4" style="height: 604px">
            <div class="card-header py-3" style="padding: 1.5rem 1.25rem">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align:center; font-size:32px">Cấp số mới</h6>
            </div>
            @include('admin.alert')

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group active-status boardcast">
                            <span>Dịch vụ khách hàng lựa chọn</span>
                            <form action="{{route('boardcast.postAdd')}}" method="post">
                            
                            <select name="nameService" id="select" class="form-control filter-active">
                                @foreach ($serviceList as $list)
                                <option selected="selected" value="{{$list->id}}">{{$list->nameService}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <a href="{{route('boardcast')}}" class="btn btn-primary btn-cancel">
                        <span> Hủy bỏ</span>
                    </a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        In số
                    </button>
                </form>
                </div>
            </div>
        </div>
    {{-- <form action="{{route('boardcast.postAdd')}}" method="post"> --}}
        
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="pop-up--container">
                        <div class="pop-up--content">
                            <h6>Số thứ tự được cấp</h6>
                            <span name="number" id="number"></span>
                            <p name="service" id="service"></p>
                            <p>(Tại quầy số 1)</p>
                        </div>
                    </div>
                    <div class="pop-up--footer">
                        <div class="pop-up--item">
                            <div class="pop-up--text">
                                <span>Thời gian cấp: </span>
                            </div>
                            <div class="pop-up--time">
                                <span id="start_date" name="start_date"></span>
                            </div>
                        </div>
                        <div class="pop-up--item">
                            <div class="pop-up--text">
                                <span>Hạn sử dụng: </span>
                            </div>
                            <div class="pop-up--expiry">
                                <span id="end_date" name="end_date"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                In số
            </button> --}}
        </div>
    </form>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        //getUsers();
        $('#select').on('change', function () {
            postAdd();
        });
        $('#submit').on('change', function () {
            postAdd();
        });
    });

    var i = 0;
    function postAdd() {
        i++;
        $(document).ready(function () {
            var numb = String(i).padStart(4, '0');
            var number = $("#select").val() + numb;
            var nameService = $("#select option:selected").text();
            // alert(nameService);

            var date = new Date()
            var start_date = date.toLocaleString();
            var end_date = date.toLocaleDateString() + ' ' + '17:00:00';

            document.getElementById("number").innerHTML = number;
            document.getElementById("service").innerHTML = nameService;
            document.getElementById("start_date").innerHTML = start_date;
            document.getElementById("end_date").innerHTML = end_date;

            $.ajax({
                method: 'get',
                url: '{{route('popup')}}',
                data: {
                    number: number,
                    nameService: service,
                    start_date: start_date,
                    end_date: end_date,
                },
            });
        });


    }
</script>
@endsection