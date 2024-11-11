
<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" id="name" placeholder="Name" required />
    <input type="email" name="email" id="email" placeholder="Email" required />
    <input type="password" name="password" id="password" placeholder="Password" required />
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required />
    <input type="submit" value="Register" />
</form>
