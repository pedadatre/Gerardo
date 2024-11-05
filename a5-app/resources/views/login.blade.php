<form method="POST" action="/login">
    @csrf
    <input type="email" name="email" id="email" placeholder="Email"/>
    <input type="password" name="password" id="password" placeholder="Password"/>
    <input type="submit" value="login"/>
</form>