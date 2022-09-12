<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img src="/assets/img/Logo alta.png" alt="">
                </div>
                <div class="form-login">
                    <form action="{{route('dashboard')}}" method="POST">
                        <div class="form">
                            <div class="form-group form-1">
                                <label class="heading">Tên đăng nhập *</label>
                                <input class="input" type="text" placeholder="Enter username" name="username" value="{{old('username')}}" required>
                            </div>
                            <div class="form-group form-1">
                                <label class="heading">Mật khẩu *</label>
                                <input class="input" type="password" placeholder="Enter password"
                                name="password" id="password" value="{{old('password')}}" required>
                                <i class="showpw fas fa-eye-slash fa-light" id="togglePassword"></i>
                                
                            </div>    
                        </div>
                        <a class="forgotpw" href="{{ route('forgotpassword') }}">Quên mật khẩu</a>

                        <button type="submit" name="" class="btn btn-primary submit">Đăng nhập</button>
                        
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