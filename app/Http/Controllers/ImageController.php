<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($filename)
    {
        // Obtener la ruta completa del archivo en el almacenamiento
        $path = storage_path('app/private/ejercicio/' . $filename);

        // Verificar si el archivo existe
        if (!Storage::disk('local')->exists('private/ejercicio/' . $filename)) {
            abort(404); // Si el archivo no existe, mostrar un error 404
        }

        // Obtener el tipo MIME del archivo
        $mimeType = mime_content_type($path);

        // Devolver el archivo con su tipo MIME adecuado
        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"', // Mostrar la imagen inline
        ]);
    }
}
