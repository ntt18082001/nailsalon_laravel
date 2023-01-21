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


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <form action="{{ route('client.account.auth') }}" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>
                        @if (session('login-err-msg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('login-err-msg') }}
                            </div>
                        @endif
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Nhập email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Nhập mật khẩu</label>
                        </div>

                        <div class="checkbox mb-3 mt-2">
                            <label>
                                <input type="checkbox" checked value="remember-me"> Nhớ mật khẩu
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
                        <div class="mt-2">
                            <a href="{{ route('client.home') }}">Trang chủ</a>
                                | Bạn chưa có tài khoản? <a href="{{ route('client.account.register') }}">Đăng ký ngay!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>