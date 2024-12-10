<?php

namespace App\Http\Controllers;

use App\Models\SubirArchivos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubirArchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubirArchivos $subirArchivos)
    {
        //
    }

    public function showForm()
    {
        return view('upload');
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function showPhotos()
    {
        // Aquí puedes recuperar las fotos o realizar otras acciones
        $photos = SubirArchivos::all();  // Supongamos que las fotos están en la base de datos

        return view('photos.index', compact('photos'));  // Devuelves las fotos a la vista 'photos.index'
    }

    public function viewPhoto($storedName)
    {
        $path = storage_path('app/private/ejercicio/' . $storedName);

        if (!file_exists($path)) {
            abort(404, 'Imagen no encontrada.');
        }

        return response()->file($path);
    }


    public function edit(SubirArchivos $subirArchivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubirArchivos $subirArchivos)
    {
        //
    }

    public function upload(Request $request)
    {
        // Validar que sea una imagen válida
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $image = $request->file('image');

        // Generar el nombre del archivo
        $timestamp = now()->format('Y_m_d_H_i_s');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $storedName = "{$timestamp}_{$originalName}.{$extension}";

        // Guardar el archivo en storage/app/private/ejercicio/
        $path = $image->storeAs('ejercicio', $storedName);

        // Guardar los detalles en la base de datos
        try {
            SubirArchivos::create([
                'original_name' => $image->getClientOriginalName(),
                'stored_name' => $storedName,
                'path' => $path,
            ]);
        } catch (\Exception $e) {
            Log::error('Error al guardar la imagen en la base de datos: ' . $e->getMessage());
            return back()->with('error', 'Error al guardar la imagen en la base de datos.');
        }

        return back()->with('success', 'Imagen subida correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubirArchivos $subirArchivos)
    {
        //
    }
}
