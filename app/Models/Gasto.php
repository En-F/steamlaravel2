<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $fillable = ['concepto', 'importe'];

    public function propietarios()
    {
        return $this->belongsTo(Propietario::class);
    }
}
