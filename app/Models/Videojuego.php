<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;

class Videojuego extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'lanzamiento',
        'desarrolladora_id'
    ];

    protected $casts = [
        'lanzamiento' => 'datetime'
    ];

    public function desarrolladora(): BelongsTo{
        return $this->belongsTo(Desarrolladora::class);
    }

    public function getLanzamientoFormateadoAttribute(){
        return fecha_larga($this->lanzamiento);
    }

    public function getPrecioFormateadoAttribute(){
        $formatter = new \NumberFormatter('es_Es',\NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->precio,'EUR');
    }

    public function generos(){
        return $this->belongsToMany(Genero::class,)
        ->withTimestamps();
    }

    public function editora(): HasManyThrough{
        return $this->hasManyThrough(Editora::class,Desarrolladora::class);
    }

    public function users(): MorphToMany{
        return $this->morphToMany(User::class,'adquirible');
    }

}
