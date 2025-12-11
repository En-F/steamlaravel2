<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Editora;
use Illuminate\Http\Request;

class DesarrolladoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('desarrolladoras.index',[
            'desarrolladoras' => Desarrolladora::with('editora')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desarrolladoras.create',[
            'editoras'=>Editora::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $desa = $request->validate([
            'denominacion'=>'required|max:255',
            'editora_id'=>'required|exists:editoras,id'
        ]);
        Desarrolladora::create($desa);
        return redirect()->route('desarrolladoras.index')->with('exito','Desarrolladora creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desarrolladora $desarrolladora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desarrolladora $desarrolladora)
    {
        $editoras = Editora::all();
        return view('desarrolladoras.edit',[
            'desarrolladora'=>$desarrolladora,
            'editoras'=>$editoras
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desarrolladora $desarrolladora)
    {
        $desa = $request->validate([
           'denominacion'=>'required|max:255',
            'editora_id'=>'required|exists:editoras,id' 
        ]);
        $desarrolladora->update($desa);
        return redirect()->route('desarrolladoras.index')->with('exito','Desarrolladora actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desarrolladora $desarrolladora)
    {
        if($desarrolladora->videojuegos()->exists()){
            return back()->with('fallo','La desarrolladora tiene videojuegos');
        }
        $desarrolladora->delete();
        return redirect()
            ->route('desarrolladoras.index')
            ->with('exito','Desarrolladora borrada correctamente');
    }
}
