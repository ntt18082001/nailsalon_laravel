<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Đăng nhập</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>

    <main class="form-signin">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 d-flex justify-content-center">
                    
                    <form action="{{ route('client.account.save') }}" method="post" autocomplete="off">
                        <h3 class="text-center">Đăng ký ngay</h3>
                        @csrf
                        <x-input name="name" type="text" placeholder="" label="Tên người dùng" />
                        <x-input name="username" label="Tên tài khoản" />
                        <x-input name="email" placeholder="Email" label="Email" />
                        <x-input name="phone_number" placeholder="Số điện thoại" label="Số điện thoại" />
                        <x-input name="password" type="password" placeholder="Mật khẩu" label="Mật khẩu" />
                        <x-input name="confirmPassword" type="password" placeholder="" label="Nhập lại mật khẩu" />
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                            <div class="mt-2">
                                <a href="{{ route('client.home') }}">Trang chủ</a>
                                |
                                Bạn đã có tài khoản?
                                <a href="{{ route('client.account.login') }}">Đăng nhập ngay!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
