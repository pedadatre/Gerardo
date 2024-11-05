{{-- <pre>
    {{ var_dump($superarray) }}
</pre> --}}

@if ($superarray == NULL)
    <p>No hay na </p>

@else
<ul>
    @foreach($superarray as $comment)
        <li><a href='/comments/{{$loop->index}}'>{{$comment}}</a> 
    @endforeach
</ul>
@endif
    <a href=/comments/create>CREAR</a>