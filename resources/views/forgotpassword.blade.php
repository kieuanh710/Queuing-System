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
                    <div class="form-login">
                        <form action="/newpassword" method="post">
                            <div class="form form-2">
                                <input class="input" type="text"  name="password" value="" required>
                                @csrf
                            </div>
                            <button type="submit" name="" class="">
                                <div class="btn btn-cancel">
                                    <span>Hủy</span>
                                </div>
                            </button>
                            <button type="submit" name="" class="">
                                <div class="btn btn-continue">
                                    <span>Tiếp tục</span>
                                </div>
                            </button>
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
    