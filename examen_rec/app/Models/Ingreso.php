<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = ['propietario_id', 'anyo', 'mes', 'importe'];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
