<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anket Formu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .option {
            border: 2px solid transparent;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .option:hover {
            background-color: #e9ecef;
        }

        .option input[type="radio"] {
            display: none;
        }

        .option label {
            margin-left: 5px;
        }

        .option.selected {
            background-color: #007bff;
            color: #fff;
        }

        .option.selected input[type="radio"] {
            border-color: #007bff;
        }

        /* Eklenen border */
        .option {
            border: 1px solid #dee2e6;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="survey-form" method="POST" action="{{ route('submitForm') }}">
                    @csrf
                    <input type="hidden" name="isim_soyisim" value="{{ $session_data }}">
                    @foreach ($questions as $q)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Soru {{ $q->id }}: {{ $q->question }}</h4>
                                <div class="option" onclick="selectOption(this)">
                                    <input type="radio" checked name="q{{ $q->id }}"
                                        id="q1-opt{{ $q->id * 5 + 1 }}" value="-2" required>
                                    <label for="q1-opt{{ $q->id * 5 + 1 }}">Tamamen Katılıyorum</label>
                                </div>
                                <div class="option" onclick="selectOption(this)">
                                    <input type="radio" name="q{{ $q->id }}" id="q1-opt{{ $q->id * 5 + 2 }}"
                                        value="-1" required>
                                    <label for="q1-opt{{ $q->id * 5 + 2 }}">Biraz Katılıyorum</label>
                                </div>
                                <div class="option" onclick="selectOption(this)">
                                    <input type="radio" name="q{{ $q->id }}" id="q1-opt{{ $q->id * 5 + 3 }}"
                                        value="0" required>
                                    <label for="q1-opt{{ $q->id * 5 + 3 }}">Nötral</label>
                                </div>
                                <div class="option" onclick="selectOption(this)">
                                    <input type="radio" name="q{{ $q->id }}" id="q1-opt{{ $q->id * 5 + 4 }}"
                                        value="1" required>
                                    <label for="q1-opt{{ $q->id * 5 + 4 }}">Pek Katılmıyorum</label>
                                </div>
                                <div class="option" onclick="selectOption(this)">
                                    <input type="radio" name="q{{ $q->id }}" id="q1-opt{{ $q->id * 5 + 5 }}"
                                        value="2" required>
                                    <label for="q1-opt{{ $q->id * 5 + 5 }}">Hiç Katılmıyorum</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function selectOption(option) {
            var parentCard = option.closest('.card');
            var optionsInCard = parentCard.querySelectorAll('.option');
            optionsInCard.forEach(function(opt) {
                opt.classList.remove('selected');
                var radio = opt.querySelector('input[type="radio"]');
                if (opt !== option) {
                    radio.checked = false;
                }
            });
            option.classList.add('selected');
            var radio = option.querySelector('input[type="radio"]');
            radio.checked = true;
        }

        function validateForm() {
            for (var i = 0; i < {{ count($questions) }}; i++) {
                var selectedOption = document.querySelector('input[name="q' + (i + 1) + '"]:checked');
                if (!selectedOption) {
                    return false;
                }
            }
            return true;
        }


    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
