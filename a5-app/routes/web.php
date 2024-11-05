<?php

use App\Models\Fichero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
// Muestra la vista principal con todos los archivos disponibles

Route::get('/', function () {
    return view('welcome')->with('ficheros', Fichero::all());
});
// Muestra la vista de inicio de sesión

Route::get('/login', function(){
    return view('login');
});

// Valida las credenciales de inicio de sesión y autentica al usuario, redirigiendo en caso de éxito
Route::post('/login', function(Request $request){
    $credentials = $request->validate([
        'email'=> ['required','email'],
        'password'=>['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

// Cierra la sesión del usuario, invalida la sesión y redirige a la página principal
Route::get('/logout', function(Request $request){
    
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});

// Guarda el archivo subido y sus detalles en la base de datos, asociado al usuario autenticado
Route::post('/upload', function(Request $request){
    $fichero = new Fichero();

    $fichero->path = $request->file('uploader_file')->store();;
    $fichero->name = $request->file('uploader_file')->getClientOriginalName();
    $fichero->user_id = Auth::user()->id;
    $fichero->save();
    return redirect('/');
});

// Descarga el archivo especificado por su ruta de almacenamiento
Route::get('/download/{fichero}', function(Fichero $fichero){
    return Storage::download($fichero->path);
});

// Elimina el archivo del almacenamiento y su registro de la base de datos si el usuario tiene permiso

Route::get('/delete/{fichero}', function(Fichero $fichero){
    Storage::delete($fichero->path);
    Fichero::destroy($fichero->id);
    return redirect('/');
})->can('delete','fichero');