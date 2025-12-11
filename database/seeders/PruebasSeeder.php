<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PruebasSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(app()->environment('local')){

            $editora_id = DB::table('editoras')->insertGetId([
                'nombre'=> 'Steam2',
            ]);
    
            $desarrolladora_id=DB::table('desarrolladoras')->insertGetId([
                'denominacion'=>'Valve',
                'editora_id'=>$editora_id,
            ]);
    
            $videojuego = DB::table('videojuegos')->insertGetId([
                'nombre'=>'Minecraft',
                'precio'=>'23.45',
                'lanzamiento'=> Carbon::yesterday(),
                'desarrolladora_id'=>$desarrolladora_id,
            ]);

            DB::table('generos')->insert([
                ['genero' => 'Ciencia-ficción'],
                ['genero' => 'Terror'],
                ['genero' => 'Arcade'],
                ['genero' => 'Conversacional'],
                ['genero' => 'Plataformas'],
                ['genero' => 'Mundo abierto'],
                ['genero' => 'Lucha 2D'],
                ['genero' => 'Lucha 3D'],
                ['genero' => 'Lógica'],
                ['genero' => 'Puzles'],
                ['genero' => 'Novela Visual'],
                ['genero' => 'Ajedrez']
            ]);
        }
        
    }
}
