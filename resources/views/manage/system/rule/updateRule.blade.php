@extends('manage.layouts.main')
@section('heading')
    {{ Breadcrumbs::render('updateRule') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý dịch vụ</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin vai trò</h6>
        </div>
       @include('admin.alert')
        <form action="{{route('rule.postUpdate')}}" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Tên vai trò *</label>
                                    <input type="text" name="nameRole" class="form-control" placeholder="Nhập tên vai trò" value="{{old('nameRole') ?? $ruleDetail->nameRole}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mô tả *</label>
                                    <textarea name="desRule" class="form-control" id="" cols="5" rows="5" placeholder="Message" spellcheck="false" value="{{old('desRule') ?? $ruleDetail->desRule}}"></textarea>
                                </div>
                            </div>
                            <span class="col">* Là trường thông tin bắt buộc</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Tên vai trò *</label>
                                    <div class="function-box scrollbar scrollbar-primary">
                                        <div class="function force-overflow">
                                            <span>Nhóm chức năng A</span>
                                            <div class="function-list">
                                                <div class="function-item">
                                                    <input type="checkbox" class="function-tick">
                                                    <span>Tất cả</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng x</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng y</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng z</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="function force-overflow">
                                            <span>Nhóm chức năng B</span>
                                            <div class="function-list">
                                                <div class="function-item">
                                                    <input type="checkbox" class="function-tick">
                                                    <span>Tất cả</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng x</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng y</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng z</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="function force-overflow">
                                            <span>Nhóm chức năng C</span>
                                            <div class="function-list">
                                                <div class="function-item">
                                                    <input type="checkbox" class="function-tick">
                                                    <span>Tất cả</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng x</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng y</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng z</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="function force-overflow">
                                            <span>Nhóm chức năng C</span>
                                            <div class="function-list">
                                                <div class="function-item">
                                                    <input type="checkbox" class="function-tick">
                                                    <span>Tất cả</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng x</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng y</span>
                                                </div>
                                                <div class="function-item">
                                                    <input type="checkbox">
                                                    <span>Chức năng z</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
                
            </div>


            <div class="card-footer">
                <a href="{{route('rule')}}" class="btn btn-primary btn-cancel">
                    <span> Hủy bỏ</span>
                </a>
                <button type="submit" name="" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>



    </div>
</div>


@endsection