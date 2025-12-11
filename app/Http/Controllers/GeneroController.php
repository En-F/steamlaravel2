<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //preparar Una cosulta:
        $q = Genero::query();
        
        //si la varible tiene algo , entramos dentro y hacemos la consulta
        if($buscar = $request->query('buscar')){
            $q->where('genero', 'like', "%$buscar%");
        };

        $sentido = $request->query('sentido') == 'desc' ? 'desc' : 'asc';
        $q->orderBy('genero',$sentido);
        return view('generos.index',[
            'generos'=>$q->paginate(5)->withQueryString(),
            'buscar'=> $buscar,
            'sentido'=>$sentido
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ge = $request->validate([
            'genero'=>'required|max:255'
        ]);

        Genero::create($ge);
        return redirect()->route('generos.index')->with('exito','Genero creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit',[
            'genero'=>$genero
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        $ge = $request->validate([
            'genero'=>'required|max:255'
        ]);

        $genero->update($ge);
        return redirect()
            ->route('generos.index')
            ->with('exito','Genero actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        if($genero->videojuegos()->exists()){
            return back()->with('fallo','Este genero pertenece a un videojuego');
        }
        $genero->delete();
        return redirect()
            ->route('generos.index')
            ->with('exito','El género se ha eliminado correctamente');
    }
}
