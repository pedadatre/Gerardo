<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
@include('navbar')
    <div class="container">
        <div class="auth-info">
        @auth
            {{ Auth::user()->name }}   |
            <a href="/logout">logout</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
        </div>
        @auth
        <form id="upload-form" method="POST" action="/upload" enctype="multipart/form-data">
            @csrf
            <input type="file" name="uploader_file" id="uploader_file" />
            <button type="button" id="preview-button">Vista Previa</button>
            <input type="submit" value="Upload"/>
        </form>
        @endauth
        <div id="file-preview"></div>
        <div class="file-list">
            @foreach ($ficheros as $fichero)
            <div class="file-item">
                @can('download', $fichero)
                <a href="/download/{{$fichero->id}}">
                @endcan
                    {{$fichero->name}}
                </a>
                @can('delete', $fichero)
                <a href="/delete/{{$fichero->id}}" class="delete-link">Borrar</a>
                @endcan
                <button type="button" class="view-button" data-file-url="{{ asset('storage/' . $fichero->path) }}">Ver</button>
                <!-- Enlace temporal para verificar la URL del archivo -->
                <a href="{{ asset('storage/' . $fichero->path) }}" target="_blank">Ver Archivo</a>
            </div>
            @endforeach
        </div>
        <form id="search-form" method="GET" action="{{ route('search') }}">
            <input type="text" name="query" id="search-query" placeholder="Buscar...">
            <button type="submit">Buscar</button>
        </form>
        <div id="search-results"></div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        var searchRoute = "{{ route('search') }}";
    </script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>
</html>