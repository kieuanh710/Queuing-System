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
                        <select name="role" id="role" class="form-control filter-active">
                            <option value="0">Tất cả</option>
                            @foreach ($roleList as $list)
                            <option value="{{$list->id}}">{{$list->nameRole}}</option>
                            @endforeach
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
                            <input name="search" id="search" placeholder="Nhập từ khóa" class="search">
                            <i class="search-icon fas fa-search fa-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>


    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-body main">
            @include('admin.alert')
            <div class="table-responsive">
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
                                <th>{{$item->nameRole}}</th>
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
    <div class="d-flex justify-content-end">
        {{$accountList->Links()}}
    </div>
</div>

<div class="add">
    <a href="{{route('account.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm tài khoản</p>
    </a>
</div>

@endsection

@section('script')
<script type="text/javascript">
    // search
    $('#search').on('keyup', function () {
        var searchFilter = $(this).val();
        //alert('hi');
        $.ajax({
            method: 'post',
            url: '{{route('accountsearch')}}',
            dataType: 'json',
            data: {
                '_token': '{{csrf_token()}}',
                searchFilter: searchFilter
            },
            success: function (data) {
                // console.log(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function (index, value) {
                    table =
                        '<tr>\
                            <td>'+ value.username + '</td>\
                            <td>'+ value.name + '</td>\
                            <td>'+ value.phone + '</td>\
                            <td>'+ value.email + '</td>\
                            <td>'+ value.nameRole + '</td>\
                            <td>'+ value.nameStatus + '</td>\
                        </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }
        });
    });
</script>

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $("#role").on('change', function(){
            var selectValue = $(this).val();
            //alert(selectValue); //id role table
            $.ajax({
                method: 'get',
                url: '{{route('accountselect')}}',
                dataType: 'json',
                data: {
                    // '_token': '{{csrf_token()}}',
                    selectValue:selectValue;
                },
                success: function (data) {
                    console.log(data);
                    // $('tbody').html('');
                    // var table = '';
                    // $('tbody').html('');
                    // $.each(data, function (index, value) {
                    //     table =
                    //         '<tr>\
                    //             <td>'+ value.username + '</td>\
                    //             <td>'+ value.name + '</td>\
                    //             <td>'+ value.phone + '</td>\
                    //             <td>'+ value.email + '</td>\
                    //             <td>'+ value.nameRole + '</td>\
                    //             <td>'+ value.nameStatus + '</td>\
                    //         </tr>';
                    //     $('tbody').append(table)
                    //     // console.log(table);
                    // })
                 }
            // });    
    
        });

    });
        
</script> --}}
@endsection