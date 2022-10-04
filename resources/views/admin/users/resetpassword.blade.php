<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
    <div class="main">
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img src="/assets/img/Logo alta.png" alt="">
                </div>
                <div class="form-login">
                    <form action="{{route('resetPassword')}}" method="post">
                        <div class="content-fg">
                            <span class="title title-reset">Đặt lại mật khẩu mới</span>
                        </div>
                            <div class="form form-reset"> 
                                {{-- <div class="form-group form-1">
                                    <label class="heading">Email</label>
                                    <input class="input" type="email" placeholder="Enter email"
                                    name="email" id="email" required>
                                </div>  --}}
                                <div class="form-group form-1">
                                    <label class="heading">Mật khẩu</label>
                                    <input class="input" type="password" placeholder="Enter password"
                                    name="password" id="password" required>
                                    <i class="showpw showeye fas fa-eye-slash fa-light" id="togglePassword"></i>
                                </div> 
                                <div class="form-group form-1">
                                    <label class="heading">Nhập lại mật khẩu</label>
                                    <input class="input" type="password" placeholder="Enter password"
                                    name="password_confirmation" id="password_confirmation"  required> 
                                    {{-- <i class="showpw fas fa-eye-slash fa-light" id="togglePassword"></i> --}}
                                    <i class="showpw showeye fas fa-eye-slash fa-light" id="NewPassword"></i>
                                </div>   
                                @if(session('error'))
                                <div class="alert alert-success"style="    
                                    top: 0px;
                                    position: relative;
                                    font-weight: 400;
                                    font-size: 14px;
                                    line-height: 21px; 
                                    color: #E73F3F;">
                                    {{session('error')}}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success"style="    
                                    top: -18px;
                                    position: relative;
                                    font-weight: 400;
                                    font-size: 14px;
                                    line-height: 21px; 
                                    color: #28a745;">
                                    {{session('success')}}
                                </div>
                            @endif 
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            </div>
                        
                            <button type="submit" name="" class="btn btn-primary submit btn-confirm">Xác nhận</button>
                            @csrf
                    </form>
                </div>
            </div>     
            <div class="system">
                <img class="img" src="/assets/img/Frame.png" alt="">
            </div>
       </div>
    </div>
    @include('admin.footer')
</body>
</html>
    