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
                    <span class="title title-newpw">Đặt lại mật khẩu mới</span>
                    <div class="form-login">
                        <form action="/forgotpassword" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form form-2">
                                <label class="heading"><b>Mật khẩu mới</b></label>
                                <div class="show">
                                    <input class="input" type="password" placeholder="Enter new password" name="password" value="" required>
                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                    <img class="showpw" src="/assets/img/u_eye-slash.png" alt="" onclick="myFunction()">
                                </div>
                            </div>
                            <div class="form form-2">
                                <label class="heading"><b>Nhập lại mật khẩu</b></label>
                                <div class="show">
                                    <input class="input" type="password" id="myInput" placeholder="Enter password" name="password" value="" pattern=".{8,}" required title="8 characters minimum">
                                    <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
                                    <img class="showpw" src="/assets/img/u_eye-slash.png" alt="" onclick="myFunction()">
                                </div>
                            </div>
                            <button type="submit" name="" class="">
                                <div class="btn btn-confirm">
                                    <span>Xác nhận</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
                    
                </div>

                <div class="system">
                    <img class="img" src="/assets/img/Frame.png" alt="">
                </div>
            </div>
    </div>
</body>
</html>
    