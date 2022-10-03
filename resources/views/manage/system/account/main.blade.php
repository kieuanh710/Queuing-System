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
                            <option selected="selected" value="0">Tất cả</option>
                            @foreach ($roleList as $list)
                            <option value="{{$list->nameRole}}">{{$list->nameRole}}</option>
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
                                <th>{{$item->role}}</th>
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
    $(document).ready(function () {
        //getUsers();
        $('#search').on('keyup', function () {
            getUsers();
        });
        $('#role').on('change', function () {
            getUsers();
        });
    });
    // search
    function getUsers() {
        var search = $('#search').val();
        var role = $('#role option:selected').text();
        // alert(search);
        // alert(role);

        $.ajax({
            method: 'get',
            url: '{{route('filterSearchAccount')}}',
            dataType: 'json',
            data: {
                search: search,
                role: role,
            },
            success: function (data) {
                console.log(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function (index, value) {
                    if(value.active==1){
                        value.active = "Hoạt động";
                    } else{
                        value.active = "Ngưng hoạt động";
                    }
                    table =
                        '<tr>\
                            <td>'+ value.username + '</td>\
                            <td>'+ value.name + '</td>\
                            <td>'+ value.phone + '</td>\
                            <td>'+ value.email + '</td>\
                            <td>'+ value.role + '</td>\
                            <td>'+ value.active + '</td>\
                            <th>'+'<a href="/admin/manage/system/account/update/'+ value.id + '">'+'Cập nhật</a>'+'</th>\
                        </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }
        });
    };
</script>

@endsection