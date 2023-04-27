<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search Result</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
    <body>        
        
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
    </body>
</html>