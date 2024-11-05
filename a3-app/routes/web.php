<?php

use App\Http\Controllers\ProfileController;
use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\StoreVotoRequest;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\TestStatus\Notice;

Route::get('/', function () {
    return view('welcome')
    ->with('noticias', Noticia::all());
});
//Esta función de route:get es la ruta en la que se accederá  al darle al botón de Enviar p
Route::get('/enviar', function () {
    return view('enviar');
});

//el store notice request dentro hemos añadido las cosas que tiene que insertar el usuario y esto hace que el /store reciba esos datos y con esos datos rellene el archivoStoreNticiasrequest

Route::post('/store', function(StoreNoticiaRequest $storeNoticiaRequest){
    $noticia = new Noticia;
    $noticia->fill($storeNoticiaRequest->validated());
    $noticia->user_id = Auth::id();

    $noticia->save();
    return redirect('/');
});

Route::get('/noticia/{noticia)', function(Noticia $noticia){
    return view('show')->with('noticia', $noticia);

});

Route::post('/votar', function(StoreVotoRequest $storeVotoRequest){
    $storeVotoRequest->validated();
    $voto = new Voto;
    $voto-> noticia_id = $storeVotoRequest->noticia_id;
    $voto->user_id = Auth::user()->id ;
    $voto->save();
    return redirect('/');
});

Route::get('/dashboard', function () {
    return view('dashboard')->with('noticias', Auth::user()->noticias);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
