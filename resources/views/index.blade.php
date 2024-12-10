<!DOCTYPE html>
<html>
<head>
    <title>Lista de Imágenes</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('upload.form') }}">Subir Imagen</a></li>
            <li><a href="{{ route('images.index') }}">Ver Imágenes</a></li>
            <li><a href="{{ route('photos.index') }}">Ver Fotos</a></li>
        </ul>
    </nav>

    <h1>Lista de Imágenes</h1>
    <table >
        <thead>
            <tr>
                <th>Nombre Original</th>
                <th>Nombre Guardado</th>
                <th>Fecha de Subida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->original_name }}</td>
                    <td>{{ $image->stored_name }}</td>
                    <td>{{ $image->created_at }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>