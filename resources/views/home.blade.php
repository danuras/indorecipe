<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script>
            document.querySelector('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var searchInput = document.getElementById('searchInput').value;
            window.location.href = '{{ route("search-result", ":search") }}'.replace(':search', searchInput);
            });
        </script>
    </head>
    <body>        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Dashboard</h2>
                </div >
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('about')}}">About</a>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('contact')}}">Kontak</a>
                </div>
                <form action="{{route('search-result')}}" method='GET'>
                    <label for="searchInput">Cari resep:</label>
                    <input type="search" id="search" name="search">
                    <input type="submit">
                </form>
                <input class="form-control" type="search" placeholder="Cari resep" aria-label="default input example" id='search-input'>
                
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                
                <div class="row">
                    @foreach ($recipes as $recipe)
                        <a href="{{route('detail-recipe', [$recipe->name, $recipe->id])}}" class='card'>
                            <div class="col-sm">
                                <img id="gambar-preview" src="{{asset(json_decode($recipe->images)[rand(0,2)])}}" alt="Preview Gambar"  width="200" height="200">
                                <p>{{$recipe->name}}</p>
                            </div>
                        </a>
                    @endforeach  
                </div>
                {!! $recipes->links('vendor.pagination.bootstrap-4') !!}
                <div class="row">
                    @foreach ($origins as $origin)
                    <a class="btn btn-primary my-2" href="{{route('show-by-origin',$origin->id)}}">
                        {{$origin->name}}
                    </a>
                    @endforeach  
                </div>
                {!! $origins->links('vendor.pagination.bootstrap-4') !!}
                <div class="row">
                    @foreach ($categories as $category)
                    <a class="btn btn-primary my-2" href="{{route('show-by-category',$category->id)}}">
                        {{$category->name}}
                    </a>
                    @endforeach  
                </div>
                {!! $categories->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
                    
    </body>
</html>