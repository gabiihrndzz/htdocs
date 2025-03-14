<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peliculas;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas=new Peliculas;
        $peliculas = $peliculas->all();
        return view('catalog.index', compact('peliculas'));
    }
    public function getShow($id)
    {
        $peliculas=new Peliculas;
        $pelicula = $peliculas->findOrFail($id);
        return view('catalog.show',compact('pelicula')); 
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function postCreate(Request $request)
    {
        $validateData= $request->validate([
            'title' => ['required','string','max:255'],
            'director' => ['required','string','max:64'],
            'year' => ['required','string','max:8'],
            'synopsis' => ['required','string' ],
            'poster' => ['required','string', 'max:255'],
            'rented' => ['required','boolean' ]
        ]);
        $pelicula = Peliculas::create($validateData);
        return view('catalog')->with('status','Pelicula creada correctamente');
    }

    public function getEdit($id)
    {
		$peliculas=new Peliculas;
        $pelicula = $peliculas->findOrFail($id);
        return view('catalog.edit',compact('pelicula'));
    }
    public function postEdit(Request $request)
    {
        $validateData = [
            'title' => $request['title'],
            'director' => $request['director'],
            'year' => $request['year'],
            'synopsis' => $request['synopsis'],
            'poster' => $request['poster'],
            'rented' => $request['rented']
        ];
        $pelicula = Peliculas::updateOrCreate(['id' => $request->id], $validateData);
        return view('catalog.show',compact('pelicula'))->with('status','Pelicula editada correctamente');
    }
}