<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $fillable = ['nombre', 'dni', 'planta', 'puerta', 'cuota'];

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
}
