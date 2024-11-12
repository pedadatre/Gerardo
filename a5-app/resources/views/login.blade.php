@include('navbar')
<link rel="stylesheet" href="{{asset('css/register.css')}}" >
<script src="{{asset('js/textosvarios.js')}}"></script>

<main>
<form method="POST" action="/login">
    <p id="log1">Login</p><br>
    @csrf
    <input type="email" name="email" id="email" placeholder="Email"/>
    <input type="password" name="password" id="password" placeholder="Password"/>
    <input type="submit" value="Login"/>
    <a href="/register"><p id="log2">If u no registred, registred here</p></a>
</form>
</main>