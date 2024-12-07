<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $resultados = DB::table('ficheroes')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();

        return view('search_results', ['resultados' => $resultados, 'query' => $query]);
    }
}