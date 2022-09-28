@extends('manage.layouts.main')
@section('heading')
{{ Breadcrumbs::render('addBoardCast') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Quản lý dịch vụ</h1>
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
                            <select name="service" class="form-control filter-active">
                                <option value="0">Tất cả</option>
                                @foreach ($serviceList as $list)
                                <option value="{{$list->id}}">{{$list->nameService}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @csrf
                <div class="footer">
                    <a href="{{route('boardcast')}}" class="btn btn-primary btn-cancel">
                        <span> Hủy bỏ</span>
                    </a>
                    <button type="button" name="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        In số
                    </button>
                   
                </div>
        </div>
    </div>

{{-- <div class="pop-up" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="pop-up--container">
        <div class="pop-up--content">
            <h6>Số thứ tự được cấp</h6>
            <span>safdfsd</span>
            <p>DV:Khám răng hàm mặt (Tại quầy số 1)</p>

        </div>
    </div>
    <div class="pop-up--footer">
        <div class="pop-up--item">
            <div class="pop-up--text">
                <span>Thời gian cấp: </span>
            </div>
            <div class="pop-up--time">
                <span>đến</span>
            </div>
        </div>
        <div class="pop-up--item">
            <div class="pop-up--text">
                <span>Hạn sử dụng: </span>
            </div>
            <div class="pop-up--expiry">
                <span>đến</span>
            </div>
        </div>
    </div>
</div> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="pop-up--container">
            <div class="pop-up--content">
                <h6>Số thứ tự được cấp</h6>
                
                <span id="number"></span>
                <p id="nameService">DV:Khám răng hàm mặt (Tại quầy số 1)</p>
    
            </div>
        </div>
        <div class="pop-up--footer">
            <div class="pop-up--item">
                <div class="pop-up--text">
                    <span>Thời gian cấp: </span>
                </div>
                <div class="pop-up--time">
                    <span id="time"></span>
                </div>
            </div>
            <div class="pop-up--item">
                <div class="pop-up--text">
                    <span>Hạn sử dụng: </span>
                </div>
                <div class="pop-up--expiry">
                    <span id="expired"></span>
                </div>
            </div>
        </div>
    </div>
  </div>



@endsection


@section('script')
<script>
    var i =0;
    function getValue() {
        i++;
        $(document).ready(function(){
            var tendichvu = jQuery( "#select option:selected" ).text();
                var madichvu = jQuery('#select').val();
                var x = new Date();
                var thoigiancap = x.toLocaleDateString() + ' ' + x.toLocaleTimeString();
                var hansd = x.toLocaleDateString() + ' 17:30:00 ';
                var y = String(i).padStart(4, '0'); 
                var stt = madichvu + y;
                
                
                document.getElementById("tendichvu").innerHTML = tendichvu;
                document.getElementById("thoigiancap").innerHTML = thoigiancap;
                document.getElementById("hansd").innerHTML = hansd;
                document.getElementById("stt").innerHTML = stt;
                
                
                $.ajax({
                    type: "GET",
                    url: '',
                    data: { 
                        number:number,
                        nameService: nameService,
                        start_time: start_time,
                        expired: expired,
                    },
                    
                });   
            
                
            
        });
    }
</script>
@endsection