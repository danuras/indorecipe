<!DOCTYPE html>
<!-- test continous deployment -->
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

<body id="home">
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
                        <a class="nav-link active" href="#home">Home</a>
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
    <main>
        <div class="container">
            {{-- search bar --}}
            <div class="row">
                <div class="col-md text-center pt-3 pb-3">
                    <form action="{{ route('search-result') }}" method='GET'>
                        <label for="searchInput">Cari Masakan:</label>
                        <input type="search" id="search" name="search">
                        <input type="submit">
                    </form>
                    <input class="form-control" type="search" placeholder="Cari Masakan"
                        aria-label="default input example" id='search-input'>
                </div>
            </div>
            {{-- daftar masakan --}}
            <div class="row">
                @foreach ($recipes as $recipe)
                    <div class="col-md-3">
                        <a href="{{ route('detail-recipe', [$recipe->name, $recipe->id]) }}" class='card'>
                            <img id="gambar-preview" src="{{ asset(json_decode($recipe->images)[rand(0, 2)]) }}"
                                alt="Preview Gambar" width="200" height="200">
                            <p>{{ $recipe->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md">
                    {!! $recipes->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    @foreach ($origins as $origin)
                        <a class="btn btn-primary my-2" href="{{ route('show-by-origin', $origin->id) }}">
                            {{ $origin->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md">
                    {!! $origins->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    @foreach ($categories as $category)
                        <a class="btn btn-primary my-2" href="{{ route('show-by-category', $category->id) }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md">
                    {!! $categories->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </main>
    {{-- main end --}}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
