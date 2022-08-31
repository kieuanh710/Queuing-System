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
                <span class="title title-reset">Đặt lại mật khẩu</span>
                <span class="title-des">Vui lòng nhập email để đặt lại mật khẩu của bạn</span>
                <div class="form-login">
                    <form action="/forgotpassword" method="post">
                        @csrf
                        <div class="form form-2">
                            @if(session('error'))
                                <div class="alert alert-success">
                                    {{session('error')}}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <input class="input" type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}" required >
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>
                        <button type="submit" name="" class="">
                            <div class="btn btn-continue">
                                <span>Tiếp tục</span>
                            </div>
                        </button>
                    </form>
                    <button type="submit" name="" class="">
                        <div class="btn btn-cancel">
                            <a href="{{ route('login') }}">Hủy</a>
                        </div>
                    </button>
                </div>
            </div>

            <div class="system">
                <img class="img" src="/assets/img/Frame.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>