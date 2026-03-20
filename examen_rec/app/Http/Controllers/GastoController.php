<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gastos.index', ['gastos' => Gasto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gastos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required|numeric',
        ]);

        Gasto::create($request->all());

        return redirect()->route('gastos.index')
                         ->with('success', 'Gasto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gasto $gasto)
    {
        return view('gastos.show', ['gasto' => $gasto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', ['gasto' => $gasto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gasto $gasto)
    {
        $datos = $request->validate([
            'concepto' => 'required',
            'importe' => 'required|numeric',
        ]);

        $gasto->update($datos);

        return redirect()->route('gastos.index');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gastos.index');;
    }
}
