<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Menü</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        body::before {
            content: "";
            background-image: url("{{ asset('bg1.jpg') }}");
            background-size: cover;
            /* Arka plan resminin boyutunu kaplamasını sağlar */
            background-position: center;
            /* Arka plan resminin ortalanmasını sağlar */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* İçeriğin üstünde olması için z-index değerini düşük ayarlayın */
        }

        .ct2 {
            margin-top: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Yeni eklenen satır */
            gap: 15%;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center
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



        .btn-option {
            text-align: center;
            width: 10em;
            height: 8em;
            font-size: 28px;
            font-weight: bold;
            margin: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0px 10px 25px rgba(73, 204, 249, 0.1);
            border-radius: 15px;
            color: #000;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .btn-option:hover {
            transform: translateY(-2px);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
        }

        @media only screen and (max-width:600px) {
            .ct2 {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
     <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo">
    <div class="container">
        <div class="ct2">
            <a class="btn btn-option" href="{{ route('index') }}">Anket</a>
            <a class="btn btn-option" href="{{ route('rp') }}">Vaka Çalışmaları</a>
        </div>
       
    </div>
</body>

</html>
