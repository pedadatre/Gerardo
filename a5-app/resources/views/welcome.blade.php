@include('navbar')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}" >

<body>
    <div class="container">
        <div class="auth-info">
        @auth
            {{Auth::user()->name}}   |
            <a href="/logout">logout</a>
        @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        @endauth
        </div>
        @auth
        <form method="POST" action="/upload" enctype="multipart/form-data">
            @csrf
            <input type="file" name="uploader_file" />
            <input type="submit" value="Upload"/>
        </form>
        @endauth
        <div class="file-list">
            @foreach ($ficheros as $fichero)
            <div class="file-item">
                @can('download', $fichero)
                <a href="/download/{{$fichero->id}}">
                @endcan
                    {{$fichero->name}}
                </a></p>
                @can('delete', $fichero)
                <a href="/delete/{{$fichero->id}}" class="delete-link">Borrar</a>
                @endcan
            </div>
        @endforeach
        </div>
        <form type='get' action=
        <input name="Search" type="search" placeholder="Ficheros a buscar"/>
    </div>
</body>