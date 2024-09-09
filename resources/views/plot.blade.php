<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.plot.ly/plotly-2.31.1.min.js" charset="utf-8"></script>
</head>

<body>
   
    <div id="myDiv"></div>
    
    <button id="btnSave">
        Resim Olarak Kaydet
    </button> 
    {{ $isim_soyisim }}
    <img src="../logo.png" alt="" id="captured">
    <script src="https://cdn.plot.ly/plotly-latest.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Define a function to execute your code
        function initializePlot() {

            let errAp = 1
            var data = [{
                x: ['Onay', 'Sevgi', 'Başarı'],
                y: [{{ $approval }}, {{ $affection }}, {{ $success }}],

                type: 'scatter'
            }];

            const layout = {
                yaxis: {
                    range: [-10, 10],
                    dtick: 2, // Aralık arası artış miktarı
                    title: 'Zayıf Yanlarınız           Güçlü Yanlarınız',
                    titlefont: {
                        color: 'red'
                    }
                },

            };
            Plotly.newPlot('myDiv', data, layout);

            $("#btnSave").click(function() {
                window.scrollTo(0, 0);
                // Convert the div to image (canvas)
                html2canvas(document.getElementById("myDiv")).then(function(canvas) {
                    // Get the image data as JPEG and 0.9 quality (0.0 - 1.0)
                    var imgdata = canvas.toDataURL("image/jpeg", 1);
                    console.log(imgdata);
                    $.ajax({
                        type: 'POST',
                        url: '/generateXlsm', // Sunucuya veriyi göndereceğiniz adresi buraya yazın
                        data: {
                            image: imgdata
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    });
                    document.querySelector('#captured').src = imgdata;
                });
            });
        }

        // Call the function after the DOM is loaded
        document.addEventListener("DOMContentLoaded", function(event) {
            initializePlot();
        });
    </script>
</body>

</html>
