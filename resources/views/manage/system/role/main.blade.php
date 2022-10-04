@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('roleList') }}
@endsection
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý vai trò</h1>
    <form action="" method="GET">
        <div class="filter">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group active-status">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group active-status">
                        <span>Từ khóa</span>
                        <div class="search-btn">
                            <input name="keyword" id="search" placeholder="Nhập từ khóa" class="search" value="{{request()->keyword}}">
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
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên vai trò</th>
                            <th>Số người dùng</th>
                            <th>Mô tả</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody> 
                        @if(!empty($roleList))
                            @foreach ($roleList as $key => $role)
                            <tr>
                                <th>{{$role->nameRole}}</th>
                                <td>{{$role->count}}</td>
                                <th>{{$role->desRole}}</th>
                                <th><a href="{{route('role.update', ['id'=>$role->id])}}">Cập nhật</a></th>
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
        {{$roleList->Links()}}
    </div>
</div>
<div class="add">
    <a href="{{route('role.add')}}">
        <i class="fas fa-solid fa-plus"></i>
        <p>Thêm vai trò</p>
    </a>
</div>

@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('keyup', function() {
            getUsers();
        });
    });
    function getUsers(){
        var search = $('#search').val();
        $.ajax({
            method:'get',
            url:'{{route('filterSearchRole')}}',
            dataType: 'json',
            data:{
                search:search,
            },
            success:function(data){
                // console.log(data);
                // $('tbody').html(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function(index, value){
                    table = 
                    '<tr>\
                        <th>'+value.nameRole+'</th>\
                        <th>'+value.count+'</th>\
                        <th>'+value.desRole+'</th>\
                        <th>'+'<a href="/admin/manage/system/role/update/'+ value.id + '">'+'Cập nhật</a>'+'</th>\
                        </tr>';

                    $('tbody').append(table)
                    // console.log(table);
                })
            }

        });
    };

</script>
@endsection