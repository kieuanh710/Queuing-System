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
                    <form action="/dashboard" method="post">
                        @csrf
                        <div class="form">
                            <div class="form-1">
                                <label class="heading"><b>Tên đăng nhập</b></label>
                                <input class="input" type="text" placeholder="Enter email" name="email" required>
                            </div>

                            <div class="form-1">
                                <label class="heading"><b>Mật khẩu</b></label>
                                <div class="show">
                                    <input class="input" type="password" id="myInput" placeholder="Enter password"
                                        name="password" required>

                                    <img class="showpw" src="/assets/img/u_eye-slash.png" alt="" onclick="myFunction()">
                                </div>
                            </div>
                            @if(session('error'))
                            <div class="alert alert-error">
                                {{session('error')}}
                            </div>
                            @endif
                            
                        </div>

                        <a class="forgotpw" href="{{ route('forgotpassword') }}">Quên mật khẩu</a>
                        <button type="submit" name="" class="">
                            <div class="btn btn-submit">
                                <span>Đăng nhập</span>
                            </div>
                        </button>

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