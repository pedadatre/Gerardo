<style>
 body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 20px;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .auth-info {
        text-align: right;
        margin-bottom: 20px;
    }
    .auth-info a {
        color: #007bff;
        text-decoration: none;
        margin-left: 10px;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    input[type="file"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .file-list {
        margin-top: 20px;
    }
    .file-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 8px;
    }
    .file-item a {
        color: #007bff;
        text-decoration: none;
    }
    .delete-link {
        color: #dc3545;
        font-weight: bold;
        text-decoration: none;
        margin-left: 20px;
    }
    .delete-link:hover {
        color: #a71d2a;
    }
</style>
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
</div>
