<?php

namespace App\Http\Controllers;

use App\Models\libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function allBooks()
    {
        $libros = libros::all();
        return view('libros', ["misLibros" => $libros]);
    }

    public function filtrado(Request $req)
    {
        $libros = libros::where('estado','=',$req->input('estado'))->get();
        return view('libros', ["misLibros" => $libros]);
    }

    public function modify(Request $req,$id)
    {
        $libros = libros::findOrFail($id);
        $libros->estado =  $req->input('estado');
        $libros->save();
      
        return redirect()->route('list');
    }

    public function addBooks(Request $req){

        $libro = new libros;

        $libro->titulo=$req->input('titulo');
        $libro->autor=$req->input('autor');
        $libro->fecha=$req->input('date');
        $libro->estado=$req->input('estado');

        $libro->save();

        $libros = libros::all();
        return view('libros', ["misLibros" => $libros]);
    }

    public function delete(Request $req){
        
        $libro=libros::find($req->input('id'));

        $libro->delete();
        
        return redirect()->route('list');
    }

    

}

?>



