<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if ($resultados->isEmpty())
    <p>No se encontraron resultados</p>
@else
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultados as $resultado)
                <tr>
                    <td>{{ $resultado->name }}</td>
                    <td>{{ $resultado->path }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
