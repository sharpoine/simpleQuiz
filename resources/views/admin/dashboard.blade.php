<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Tablosu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>İsim Soyisim</th>
                    <th>Açıklama</th>
                    <th>Grafik</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->name . ' ' . $d->surname }}</td>
                        <td>{{ $d->comment }}</td>
                        <td>
                            <button class="btn btn-primary" id="btnSave{{ $d->id }}" data-id="{{ $d->id }}">Kaydet</button>
                            <div id="graph{{ $d->id }}" style="padding:24px;display:none"></div>
                            <img src="../logo.png" alt="" id="captured{{ $d->id }}">
                        </td>
                        <td>{{ $d->created_at }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Define a function to execute your code
        function initializePlot(id, approval, affection, success, perfectionism, righteousness, god_complex, autonomy) {
            var data = {}
            var layout = {}


            data = [{
                x: ['Onay', 'Sevgi', 'Başarı', 'Mükemmelliyetçilik', 'Yetki Sahibi Olmak', 'Tanrıyı Oynamak',
                    'Özerklik'
                ],
                y: [approval, affection, success, perfectionism, righteousness, god_complex, autonomy],

                type: 'scatter'
            }];

            layout = {
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    color: 'rgb(0, 0, 255)',
                    weight: 'bold' // Kalınlık ayarı
                },
                yaxis: {
                    range: [-10, 10],
                    dtick: 2, // Aralık arası artış miktarı
                    title: 'Zayıf Yanlarınız           Güçlü Yanlarınız',
                    titlefont: {
                        color: 'red'
                    }
                },

            };
            Plotly.newPlot('graph' + id, data, layout);
            Plotly.toImage('graph' + id, {
                format: 'jpeg',
                width: 800,
                height: 600,
                scale: 3
            }).then(function(dataUrl) {
                var link = document.createElement('a');
                link.href = dataUrl;
                link.download = "grafik" + id + ".jpg"; // Dosya adı

                // Linki tetikle
                link.click();
            });

        }
        $('button[id^="btnSave"]').click(function() {

            let id = $(this).data("id");
            $.ajax({
                url: "{{ route('admin.getAnketValue') }}?id=" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    data = res[0]
                    console.log(data);
                    initializePlot(data.id, data.approval, data.affection, data.success, data
                        .perfectionism, data.righteousness, data.god_complex, data.autonomy)

                }
            });


        });

        // Call the function after the DOM is loaded
    </script>
</body>

</html>
