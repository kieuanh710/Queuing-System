<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queuing System</title>
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="../../public/assets/css/base.css">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600;1,700;1,800&family=Open+Sans:wght@400;500&family=Pacifico&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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
                        <form action="./login" method="post">
                            <div class="form form-2">
                                <label class="heading"><b>Mật khẩu mới</b></label>
                                <div class="show">
                                    <input class="input" type="password" placeholder="Enter new password" name="username" value="" required>
                                    <input type="hidden" name="_method" value="POST" />
                                    <img class="showpw" src="/assets/img/u_eye-slash.png" alt="" onclick="myFunction()">
                                </div>
                            </div>
                            <div class="form form-2">
                                <label class="heading"><b>Nhập lại mật khẩu</b></label>
                                <div class="show">
                                    <input class="input" type="password" id="myInput" placeholder="Enter password" name="pass" value="" pattern=".{8,}" required title="8 characters minimum">
                                        <!-- <input type="checkbox" onclick="myFunction()"> Show Password -->
                                        <img class="showpw" src="/assets/img/u_eye-slash.png" alt="" onclick="myFunction()">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    
                    <button type="submit" name="" class="">
                        <div class="btn btn-confirm">
                            <span>Xác nhận</span>
                        </div>
                    </button>
                </div>

                <div class="system">
                    <img class="img" src="/assets/img/Frame.png" alt="">
                </div>
            </div>
    </div>
</body>
</html>
    