<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichero;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'uploader_file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Guardar el archivo en el disco 'public'
        $path = $request->file('uploader_file')->store('uploads', 'public');

        $fichero = new Fichero();
        $fichero->name = $request->file('uploader_file')->getClientOriginalName();
        $fichero->path = $path; // Guardar la ruta relativa
        $fichero->user_id = auth()->id();
        $fichero->save();

        return redirect('/');
    }

    public function download(Fichero $fichero)
    {
        return Storage::disk('public')->download($fichero->path);
    }

    public function delete(Fichero $fichero)
    {
        Storage::disk('public')->delete($fichero->path);
        Fichero::destroy($fichero->id);
        return redirect('/');
    }

    public function getFileUrl($id)
    {
        $fichero = Fichero::findOrFail($id);
        return response()->json(['url' => Storage::url($fichero->path)]);
    }
}