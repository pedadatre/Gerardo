@include('navbar')
<link rel="stylesheet" href="{{asset('css/register.css')}}" >
<main>
    
<form method="POST" action="/login">
    <p>Login</p><br>
    @csrf
    <input type="email" name="email" id="email" placeholder="Email"/>
    <input type="password" name="password" id="password" placeholder="Password"/>
    <input type="submit" value="Login"/>
</form>
</main>