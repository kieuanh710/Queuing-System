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
                @include('admin.alert')
                <div class="form-login">
                    <form action="{{route('ResetPasswordForm')}}" method="post">
                        <div class="content-fg">
                            <span class="title title-reset">Đặt lại mật khẩu</span>
                            <span class="title-des">Vui lòng nhập email để đặt lại mật khẩu của bạn</span>
                            <input class="input" type="text" name="email" placeholder="Enter your email" value="" required >
                            <p class="text-danger" style="text-align: left; color: red; margin-top: 5px">@error('email'){{ $message }} @enderror</p>
                        </div>
                        
                        <div class="footer-fg">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-cancel">
                                <span> Hủy</span>
                            </a>
                            <button type="submit" name="" class="btn btn-primary btn-continue">Tiếp tục</button>
                        </div>

                        @csrf
                    </form>
                </div>
            </div>

            <div class="system">
                <img class="img" src="/assets/img/Frame.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>