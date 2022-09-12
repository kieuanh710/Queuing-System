<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="logo">
                <img src="/assets/img/Logo alta.png" alt="">
            </div>
            <div class="content">
                <div class="form-login">
                    <form action="{{route('dashboard')}}" method="POST">
                        <div class="form">
                            <div class="form-group form-1">
                                <label class="heading">Tên đăng nhập *</label>
                                <input class="input error" type="text" placeholder="Enter username" name="username" value="{{old('username')}}" required>
                            </div>
                            <div class="form-group form-1">
                                <label class="heading">Mật khẩu *</label>
                                <input class="input error" type="password" placeholder="Enter password"
                                name="password" id="password" value="{{old('password')}}" required>
                                <i class="showpw fas fa-light fa-eye-slash" id="togglePassword"></i>
                            </div>

                            @if(session('error'))
                                <div class="alert alert-success"style="    
                                    top: -18px;
                                    position: relative;
                                    font-weight: 400;
                                    font-size: 14px;
                                    line-height: 21px; 
                                    color: #E73F3F;">
                                    {{session('error')}}
                                </div>
                            @endif
                        </div>
                        
                        <button type="submit" name="" class="btn btn-primary submit">Đăng nhập</button>
                        <a class="forgotpw fail" href="{{ route('forgotpassword') }}">Quên mật khẩu</a>
                        
                        @csrf
                    </form>
                </div>
            </div>

            <div class="system">
                <img class="img-login" src="/assets/img/Hethong.png" alt="">
                <div class="text">
                    <span>Hệ thống</span>
                    <span>Quản lý xếp hàng</span>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>