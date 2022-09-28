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

        <div class="card-body" style="margin-top: 20px">
            <div class="row">
                {{-- avata --}}
                <div class="col-sm-3">
                    <div class="avatar">
                        <img src="/assets/img/avatar/{{$user->avatar}}" alt="Avata">
                        <button data-toggle="modal" data-target="#exampleModalCenter" style="border: none; padding: 0px">
                            <i class="fas fa-light fa-camera"></i>
                        </button>
                       
                        <span> {{Auth::user()->name}}</span>
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
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="pop-up--container">
                <div class="pop-up--content">
                    <h6 style="margin-bottom: 20px">Đổi avata</h6>
                    <form enctype="multipart/form-data" action="{{route('update')}}" method="POST" style="display: flex">
                        @csrf
                        <input type="file" name="avatar" style="position: relative; top: 12px;">
                        <input type="submit" value="UPLOAD" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection