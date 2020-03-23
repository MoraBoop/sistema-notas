<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function nota(){
        $notas = App\Nota::all();
        return view('nota', compact('notas'));
        
    }

    public function detalle($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function crear(Request $request){

        $request->validate([
            'nombre'=> 'required',
            'descripcion'=> 'required',
        ]);

        $nota = new App\Nota;
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;

        $nota->save();

        return back();
    }

    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre'=> 'required',
            'descripcion'=> 'required',
        ]);
        $nota = App\Nota::findOrFail($id);
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->save();
        return back()->with('mensaje', 'Nota Actualizada');        
    }

    public function eliminar($id){
        $nota = App\Nota::findOrFail($id);
        $nota->delete();
        return back();
    }
}
