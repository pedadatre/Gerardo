<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ProductController extends Controller
{
    public $seleccion, $ofertas, $topventas;

    function init_variables() {
        $this->ofertas = [
            [ "name" => "producto oferta 1", "id" => 993],
            [ "name" => "producto oferta 2", "id" => 994]
        ];
    }

    function index() {
        //session()->forget('comments');
        return view('index')->with('superarray', session('comments'));
    }

    function oferta() {
        $this->init_variables();
         return view('ofertas')->with('ofertas',$this->ofertas);
        
    }

    function productos() {
        $this->init_variables();
         return view('ofertas')->with('ofertas',$this->ofertas);
        
    }
}