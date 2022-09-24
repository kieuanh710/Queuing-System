@extends('manage.layouts.main')
@section('heading')
{{ Breadcrumbs::render('info') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- @if(session('error'))
                    <div class="alert alert-error">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error">
                        {{session('error')}}
                    </div>
                @endif -->
        {{-- <form action="{{route('update')}}" method="POST"> --}}
            <div class="card-body" style="margin-top: 20px">
                <div class="row">
                    {{-- avata --}}
                    <div class="col-sm-3">
                        <div class="avatar">
                            <img src="/assets/img/avatar/{{$user->avatar}}" alt="Avata">
                            
                            <form enctype="multipart/form-data" action="{{route('update')}}" method="POST">
                                @csrf
                                <input type="file" name="avatar">
                                <input type="submit" value="upload" class="btn btn-sm btn-primary">
                            </form>
                            <span> {{Auth::user()->name}}</span >
                        </div>
                    </div>
                    {{-- info --}}
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Tên người dùng </label>
                                    <input type="text" name="" class="form-control form-control-info"
                                         value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Tên đăng nhập </label>
                                    <input type="text" name="" class="form-control form-control-info"
                                    value="{{Auth::user()->username}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Số điện thoại </label>
                                    <input type="text" name="" class="form-control form-control-info"
                                        value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Mật khẩu</label>
                                    <input type="text" name="" class="form-control form-control-info"
                                    value="{{Auth::user()->password}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="" class=" form-control form-control-info"
                                    value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Vai trò</label>
                                    <input type="text" name="" class="form-control form-control-info"
                                    value="{{Auth::user()->nameRole}}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            {{-- @csrf --}}
        {{-- </form> --}}
    </div>
</div>
@endsection