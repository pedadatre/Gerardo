<?php

namespace App\Http\Controllers;

use App\Models\Fichero;

class FicheroController extends Controller
{

public function search(){
    $search_text= $_GET('query');
    $ficheros = Fichero::where('title','LIKE','%'.$search_text.'%');
}

}