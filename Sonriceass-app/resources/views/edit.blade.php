<form method=PATCH action=/comments/{{$id}}>
    <input type=hidden name=_method value=PATCH>
    <input name=comment value='{{$ctext}}'>
    <input type=submit>
</form"