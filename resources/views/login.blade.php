<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FAFBFC;
        }

        .containx {
            padding: 100px 50px 35px 50px;
            background-image: url("{{ asset('login.png') }}");
            background-size: contain, 810px;
            background-repeat: no-repeat;
            background-position: bottom;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: fixed;
        }

        .logo {
            top: 0;
            left: 0;
            margin: 5px;
            position: absolute;
            text-align: center;
            width: 148px;
            position: absolute;

        }

        .login-container {
            margin: 0 auto;
            width: 368px;
            padding: 30px 50px 20px 50px;
            border-radius: 10px;

            background-color: #FAFBFC
        }

        .login-container h2 {
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            line-height: 1.5;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #D53B4E;
            color: #fff;
            cursor: pointer;
        }

        .right-bottom {
            position: absolute;
            z-index: 999;
            text-align: right;
            right: 5%;
            bottom: 5%;
            color: #FFF;
            font-weight: normal;
            font-size: 24px
        }

        .left-top {
            z-index: 999;
            text-align: left;
            position: absolute;
            left: 5%;
            top: 5%;
            font-size: 24px
        }


        .mobile-container {
            display: none;
        }

        .login-container button[type="submit"]:hover {
            background-color: #df4d5e;
        }

        @media only screen and (max-width: 500px) {
            .containx {
                background-image: url();
                background-color: #FAFBFC;
            }
            .logo{
                position: fixed;
                left: 30%;
            }
            .login-container {
                padding: 0;
                width: 100%;
                border:0;
            }

            .right-bottom {
                display: none
            }



            .mobile-text {

                background-color: transparent;

            }
        }

        @media only screen and (max-height: 500px) {
            .containx {
                background-image: url();
                background-color: #FAFBFC;
            }



            .left-top {
                display: none
            }

            .right-bottom {
                display: none
            }



        }
    </style>
</head>

<body>
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="left-top"></h2>
        <div class="containx">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo">
            <div class="login-container">

                <form action="{{ route('loginPost') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input placeholder="İsim" name="isim" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input placeholder="Soyisim" name="soyisim" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input placeholder="Şifre" name="sifre" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Giriş Yap</button>
                </form>
            </div>

        </div>
        <h2 class="right-bottom">
            Yeni Nesil<br><span style="font-weight: bold;">Değerlendirme Merkezinin</span><br>Tahmin
            Gücünü Yakalayın</h2>


    </div>

</body>

</html>
