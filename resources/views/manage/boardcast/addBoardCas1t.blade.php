<body>
	<div>
		{{-- <link href="{{asset('css/capso.css');}}" rel="stylesheet" /> --}}

		<div class="cpsmi-container">
			<div class="container-all">
				<div class="topbar-all">
					<div class="breadcrumbs">
					{{-- @include('number.breadscrum') --}}
						<img src="{{asset('playground_assets/uanglerighti339-svs4.svg');}}" alt="uanglerightI339"
							class="cpsmi-uangleright1" />
						<button class="cpsmi-button2">
							<span class="cpsmi-text04  ">
								<span>Cấp số mới</span>
							</span>
						</button>
					</div>
					<div class="cpsmi-frame271">
						<div class="cpsmi-vuesaxboldnotification">
							<div class="cpsmi-vuesaxboldnotification1">
								<div class="cpsmi-notification">
									<img src="{{asset('playground_assets/vectori339-xzie.svg');}}" alt="VectorI339"
										class="cpsmi-vector" />
									<img src="{{asset('playground_assets/vectori339-nd5f.svg');}}" alt="VectorI339"
										class="cpsmi-vector01" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<span class="cpsmi-text10 list-index "><span>Quản lý cấp số</span></span>

				<div class="cpsmi-frame624726">
					<span class="cpsmi-text26 "><span>CẤP SỐ MỚI</span></span>
					<span class="cpsmi-text28 chitiettieude ">
						<span>Dịch vụ khách hàng lựa chọn</span>
					</span>
					<form action="{{ route('boardcast.postAdd') }}" method="post">
              @csrf
              <select name="nameService" id="select" class="form-control filter-active">
                @foreach ($serviceList as $list)
                <option selected="selected" value="{{$list->id}}">{{$list->nameService}}</option>
                @endforeach
            </select>
              
        
              <div class="cpsmi-frame624757">
                <div class="cpsmi-frame624750">
                  <button onclick="getValue()" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="cpsmi-button3 cpsmi-text32">In số</button>
                  
                    <a href="{{route('boardcast')}}" class="cpsmi-button4">
                    <span class="cpsmi-text34"><span>Hủy bỏ</span></span>
</a>

</form>

                </div>
              </div>
              
           
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="popupins-popupins">
        <button type="button" class="popupins-fix btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
          <div class="popupins-frame624776">
            <div class="popupins-frame624778">
             
              <span class="popupins-text 2222Bold">
                <span>Thời gian cấp:</span>
              </span>
              <span id="thoigiancap" class="popupins-text02 2222Bold">
              </span>
            </div>
            <div class="popupins-frame624779">
              <span class="popupins-text04 2222Bold">
                <span>Hạn sử dụng:</span>
              </span>
              <span id="hansd" class="popupins-text06 2222Bold">
              </span>
            </div>
          </div>
          <div class="popupins-group625227">
            <span class="popupins-text08 ">
              <span>Số thứ tự được cấp</span>
            </span>
            <span id="stt" class="popupins-text10"></span>
            <span class="popupins-text12">
			DV:
			 <span id="tendichvu" class="popupins-text13"></span>

              <span>(tại quầy số 1)</span>
            </span>
          </div> 
 
    </div>
    <!-- <button class="btn btn-primary" type="submit">Tạo số</button> -->
    </div>
   
  </div>
  </form>
  <script>
var i =0;
function getValue() {
	i++;
	jQuery(document).ready(function () 
	{
		
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
			jQuery.ajax({
				url: '/tendichvu/thoigiancap/hansd/stt',
				type: "GET",
				data: { 'tendichvu': tendichvu,'thoigiancap': thoigiancap,
				'hansd': hansd,'stt':stt},
			});
		
	});
}
</script>
				</div>
       
      </div>
  </div>
</body>
