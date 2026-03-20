<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $propietario_id = $request->query('propietario');

        $dinero_col = DB::table('propietarios')->where('id', $propietario_id)->select('cuota')->get();

        $operacion = $dinero_col[0]->cuota * 75 / 100;

        // dd($dinero_col[0]->cuota);
        // dd($operacion);

        return view('ingresos.create', ['id' => $propietario_id, 'operacion' => $operacion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'propietario_id' => 'required:exists:propietarios,id',
            'anyo' => 'required|integer|min_digits:4|max_digits:4',
            'mes' => 'required|integer|min:1|max:12',
            'importe' => 'required|decimal:0,2',
        ]);

        Ingreso::create($datos);
        return redirect()->route('propietarios.show', ['propietario' => $datos['propietario_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingreso $ingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }

    public function deudas($anyo, $mes)
    {
        $deudas = DB::table('ingresos')
            ->join('propietarios', 'ingresos.propietario_id', '=', 'propietarios.id')
            ->where('ingresos.anyo', $anyo)
            ->where('ingresos.mes', $mes)
            ->whereColumn('ingresos.importe', '<', DB::raw('propietarios.cuota * 0.75'))
            ->select('propietarios.nombre', 'propietarios.dni', 'ingresos.importe')
            ->get();

        return view('ingresos.deudas', ['deudas' => $deudas]);
    }
}
