<!DOCTYPE html>
<html>

<head>
    <title>Subir Imagen</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
</head>

<body>
<nav class="navbar">
        <ul class="navbar-links">
            <li><a href="{{ route('upload.form') }}">Upload Images</a></li>
            <li><a href="{{ route('photos.index') }}">Images</a></li>
        </ul>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('upload.handle') }}" method="POST" enctype="multipart/form-data" class="upload-form">
            @csrf
            <label for="image" class="file-label">Seleccionar Imagen</label>
            <input type="file" id="image" name="image" required class="file-input">
            <button type="submit" class="submit-button">Subir Imagen</button>
        </form>
    </div>
</body>

</html>