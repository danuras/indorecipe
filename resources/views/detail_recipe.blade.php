<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detail Resep</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
    <body>        
        <div class = 'row'>
            @foreach (json_decode($recipe->images) as $image)
                <img id="gambar-preview" src="{{asset($image)}}" alt="Preview Gambar"  width="200" height="200">
            @endforeach
            <div class='col'>
                <h1>{{$recipe->name}}</h1>
                <p>Lama Penyajian: {{$recipe->cooking_time}}</p>
                <p>Porsi: {{$recipe->portion}}</p>
            </div>
        </div>
        <div class='col'>
            <h2>Deskripsi: </h2>
            <p>
                {{$recipe->description}}
            </p>
            <h2>Bahan-bahan: </h2>
            @foreach($groupIngredients as $gi)
                <h2>{{$gi[0]->group}}</h2>
                <ul class="list-group">
                    @foreach ($gi as $ingredient)
                        <li class="list-group-item">{{$ingredient->value}}</li>
                    @endforeach
                </ul>
            @endforeach
            
            <h2>Langkah-langkah: </h2>
            <ol class="list-group">
            @foreach($steps as $step)
                <li class="list-group-item">{{$step->value}}</li>
                    <div class="row">
                        @foreach (json_decode($step->images) as $image)
                            <img id="gambar-preview" src="{{asset($image)}}" alt="Preview Gambar"  width="80" height="80">
                        @endforeach
                    </div>
            @endforeach
            </ol>

        </div>
    </body>
</html>