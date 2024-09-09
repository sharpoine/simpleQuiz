<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seçim Ekranı</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center; 
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        body::before {
            content: "";
            background-image: url("{{ asset('bg1.jpg') }}");
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .grid-container {
            margin-top: 10%;
            display: flex;
            flex-wrap: wrap;
            /* Allow buttons to wrap on smaller screens */
            justify-content: center;
            align-items: center;
            gap: 1%;
        }


        .btn-option {
            margin: 2%;
            padding: 24px;
            text-align: center;
            width:15%;
            /* Allow buttons to adjust width */
            height: 18%;
            font-size: 18px;
            /* Adjust font size for better readability */
            font-weight:normal;
            border: none;
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0px 10px 25px rgba(73, 204, 249, 0.1);
            border-radius: 15px;
            color: #000;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none;
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


        .btn-option:hover {
            transform: translateY(-2px);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
        }

        
    </style>
</head>

<body>
    <img src="{{ asset('img/logo.svg') }}" class="logo" alt="Logo">
    <div class="grid-container">
        <a href="{{ route('rpDetail', ['detail' => 1]) }}" class="btn btn-option">Uzman Vakası</a>
        <a href="{{ route('rpDetail', ['detail' => '1-2']) }}" class="btn btn-option">Bekleyen İşler</a>
        <a href="{{ route('rpDetail', ['detail' => 2]) }}" class="btn btn-option">Ekibe Sesleniş</a>
        <a href="{{ route('rpDetail', ['detail' => 3]) }}" class="btn btn-option">Yatırım Kararı</a>
        <a href="{{ route('rpDetail', ['detail' => 4]) }}" class="btn btn-option">Terfi Alamayan Yönetici</a>
        <a href="{{ route('rpDetail', ['detail' => 5]) }}" class="btn btn-option">Tercih Robotu</a>
        <a href="{{ route('rpDetail', ['detail' => 6]) }}" class="btn btn-option">Limit Aşımlı Müşteri</a>
        <a href="{{ route('rpDetail', ['detail' => 7]) }}" class="btn btn-option">Palm Analiz</a>
        <a href="{{ route('rpDetail', ['detail' => 8]) }}" class="btn btn-option">Kaytaran Uzman</a>
        <a href="{{ route('rpDetail', ['detail' => 9]) }}" class="btn btn-option">USP Bilişim</a>

    </div>
</body>

</html>
