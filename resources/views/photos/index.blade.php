<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-links">
            <li><a href="{{ route('upload.form') }}">Upload Images</a></li>
            <li><a href="{{ route('photos.index') }}">Images</a></li>
        </ul>
    </nav>

    <div class="gallery">
        @foreach ($photos as $photo)
        <div class="card">
            <a href="{{ route('photos.view', $photo->stored_name) }}" class="gallery-link">
                <img
                    src="{{ route('photos.view', $photo->stored_name) }}"
                    alt="{{ $photo->original_name }}">
            </a>
            <!-- Información de la imagen -->
            <div class="info">
                <h2>{{ $photo->original_name }}</h2>
                <p>{{ $photo->stored_name }}</p>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>