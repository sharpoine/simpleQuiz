<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Sayfa Örneği</title>
    <style>
        body {
            background-color: #F0F2F5;
            /* Beyazdan biraz daha koyu bir ton */
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            /* Inter fontunu kullan */
            overflow-x: hidden;
            /* Yatay scroll barı gizle */
        }

        .container {
            width: 210mm;
            /* A4 kağıdının genişliği */
            background-color: #FFFFFF;
            /* A4 kağıdının rengi */
            margin: 40px auto;
            /* Sayfayı merkezlemek için margin ekle */
            box-sizing: border-box;
            text-align: justify;
            /* Metni doğrult */
            font-weight: bold;
            /* Başlığı kalın yap */
            /* Dikey scroll barı ekle */
            max-height: calc(100vh - 160px);
            /* Sayfanın yüksekliğine göre içerik boyutunu ayarla */
            height: 1123px;
        }

        .logo {
            position: fixed;
            /* Logo sabit konumda */
            bottom: 20px;
            /* Sayfanın alt kısmından 20px yukarıda */
            left: 50%;
            /* Sayfanın ortasında */
            transform: translateX(-50%);
            /* Yatayda merkezle */
            width: 10%;
            /* Logo genişliği */
            z-index: 999;
            /* Logo'nun diğer içeriklerin üzerine gelmesini sağla */
        }
        
    </style>
</head>

<body>

    <div class="container">
        <iframe style="height: 100%;width:100%" src="{{ asset('/rpdocs/'.$detail.'.pdf') }}"></iframe>
    </div>

    <img src="{{ asset('img/logo.svg') }}" class="logo" alt="Logo">

</body>

</html>
