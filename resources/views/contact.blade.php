<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Portal Kuliner Indonesia</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Portal Kuliner Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('contact') }}">GitHub</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar end --}}

    {{-- main --}}
    <div class="container pt-5">
        <div class="row text-center">
            <div class="col">
                <h1>Github</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Webiste ini bersifat open source.</p>
                <p>Semua orang boleh memberi kontribusi seperti menambahkan masakan.</p>
                <p>GitHub bisa di akses pada <a
                        href="https://github.com/danuras/indorecipe">https://github.com/danuras/indorecipe</a>.</p>
            </div>
        </div>
    </div>
    {{-- main end --}}
</body>

</html>
