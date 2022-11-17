@extends('layouts.app')

@section('content')
<main>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <div class="album py-5 bg-light">
        <div class="container">
            <form action="{{ route('subirMusica') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <label for="staticEmail2">Subir Musica</label>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre de la canción</label>
                    <input type="text" class="form-control" name="nombre_musica" placeholder="Agregue nombre de la canción">
                </div>
                <div class="col-auto">
                    <input class="form-control" type="file" name="musica">
                </div>
                <div class="col-auto">
                    <input class="form-control" type="file" name="musica">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($musicas as $musica)
                <div class="col">
                    <div class="card shadow-sm">
                        <img height="200" src="/musica/{{$musica->ruta}}" alt="Imagen">
                        <audio autoplay src="mp3"></audio>
                        <div class="card-body">
                            <p class="card-text"><center>{{$musica->nombre_musica}}</center></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('eliminarMusica') }}">
                                    @csrf
                                    <div class="btn-group">
                                        <input type="hidden" name="id_musica" value="{{$musica->id}}">
                                        <audio controls="" style="vertical-align: middle" src="mostrarCancion/prueba.mp3" type="audio/mp3" controlslist="nodownload">Your browser does not support the audio element.
                                        </audio>
                                        <button><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>

    </script>
</main>
@endsection