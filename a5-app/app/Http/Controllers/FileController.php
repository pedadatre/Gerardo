<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichero;

class FileController extends Controller
{
    public function getFileUrl($id)
    {
        $fichero = Fichero::find($id);

        if ($fichero) {
            return response()->json(['url' => asset('storage/' . $fichero->path)]);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}