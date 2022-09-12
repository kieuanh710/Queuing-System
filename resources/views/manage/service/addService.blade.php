@extends('manage.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý dịch vụ</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin dịch vụ</h6>
        </div>
       @include('admin.alert')
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mã dịch vụ *</label>
                                    <input type="text" name="idService" class="form-control" placeholder="Nhập mã dịch vụ" value="{{old('idService')}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Tên dịch vụ *</label>
                                    <input type="text" name="nameService" class="form-control" placeholder="Nhập tên dịch vụ" value="{{old('nameService')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mô tả *</label>
                            <textarea name="desService" class="form-control" id="" cols="5" rows="5" placeholder="Mô tả dịch vụ" spellcheck="false"></textarea>
                        </div>
                    </div>
                </div>
                
                {{-- Checkbox --}}
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quy tắc cấp số</h6>
                </div>
                <div class="checkbox">
                    <div class="checkbox-item">
                        <div class="checkbox-item--first">
                            <input type="checkbox">
                            <span>Tăng tự động từ:</span>
                        </div>
                        <div class="checkbox-item--last">
                            <input type="text" name="">
                            <span>đến</span>
                            <input type="text" name="">
                        </div>
                    </div>

                    <div class="checkbox-item">
                        <div class="checkbox-item--first">
                            <input type="checkbox">
                            <span>Prefix:</span>
                        </div>
                        <div class="checkbox-item--last">
                            <input type="text" name="" class="check-input">
                        </div>
                    </div>

                    <div class="checkbox-item">
                        <div class="checkbox-item--first">
                            <input type="checkbox">
                            <span>Surfix:</span>
                        </div>
                        <div class="checkbox-item--last">
                            <input type="text" name="" class="check-input">
                        </div>
                    </div>

                    <div class="checkbox-item">
                        <div class="checkbox-item--first">
                            <input type="checkbox">
                            <span>Reset mỗi ngày</span>
                        </div>
                    </div>
                </div>

                <span class="">* Là trường thông tin bắt buộc</span>
            </div>


            <div class="card-footer">
                <a href="{{route('service')}}" class="btn btn-primary btn-cancel">
                    <span> Hủy bỏ</span>
                </a>
                <button type="submit" name="" class="btn btn-primary">Thêm thiết bị</button>
            </div>
            @csrf
        </form>



    </div>
</div>


@endsection