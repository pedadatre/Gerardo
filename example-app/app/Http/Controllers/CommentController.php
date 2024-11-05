<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
   
    

    function index() {
        //session()->forget('comments');
        return view('index')->with('superarray', session('comments'));
    }

    function create() {
        return view('create');
        
    }

    function store(Request $request) {
        session()->push("comments", $request->comment);
        return redirect('comments');
    }
    function show($commentid){
    return view('show')->with('texto', session('comments')[$commentid])
                        ->with('superarray', session('comments'))
                        ->with('id',$commentid);
    }
    function edit(string $commentid){
        return view('edit')->with('id',$commentid)
                            ->with('ctext', session('comments')[$commentid])
        ;
    }
        function update(Request $request, string $commentid) {
            session('comments')[$commentid]= $request->comment;
            session()->put('comments',session('comments'));
            return session('comments');
        }
        function delete(string $commentid) {
            $comentarios= session('comments');
            array_splice($comentarios,$commentid,1);
            session()->put('comments',session('$comentarios'));
            return redirect('/comments');
        }
}