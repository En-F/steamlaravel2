<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editoras.index',[
            'editoras'=>Editora::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $edi = $request->validate([
            'nombre'=>'required|max:255'
        ]);
        Editora::create($edi);
        return redirect()->route('editoras.index')->with('exito','Editora creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Editora $editora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editora $editora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editora $editora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editora $editora)
    {
        if($editora->desarrolladoras()->exists()){
            return back()->with('fallo','La Editora pertenece a una desarrolladora'); 
        }
        
        $editora->delete();
        return redirect()->route('editoras.index')->with('exito','Editora borrada corractemante');
    }
}
