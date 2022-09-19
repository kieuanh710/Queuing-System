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
                    <form action="{{route('forgotpasswordPost')}}" method="post">
                        <div class="content-fg">
                            <span class="title title-reset">Đặt lại mật khẩu</span>
                            <span class="title-des">Vui lòng nhập email để đặt lại mật khẩu của bạn</span>
                            <input class="input" type="text" name="email" placeholder="Enter your email" value="" required >
                            <p class="text-danger" style="text-align: left; color: red; margin-top: 5px">@error('email'){{ $message }} @enderror</p>
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
                            @if(session('success'))
                                <div class="alert alert-success"style="    
                                    top: 0px;
                                    left: -40px;
                                    position: relative;
                                    font-weight: 400;
                                    font-size: 14px;
                                    line-height: 21px; 
                                    color: #28a745;">
                                    {{session('success')}}
                                </div>
                            @endif
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