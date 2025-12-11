<?php

namespace App\Models;

use App\Http\Controllers\VideojuegoController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desarrolladora extends Model
{
    protected $fillable = [
        'denominacion',
        'editora_id'

    ];
    
    public function videojuegos(): HasMany{
        return $this->hasMany(Videojuego::class);
    }

    public function editora(){
        return $this->belongsTo(Editora::class);
    }
}
