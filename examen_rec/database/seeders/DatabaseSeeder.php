<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('gastos')->insert([
            ['concepto' => 'Piscina', 'importe' => 100.00],
        ]);

        DB::table('gastos')->insert([
            ['concepto' => 'Perro', 'importe' => 200.00],
        ]);



        $propietario1 = DB::table('propietarios')->insert([
            ['dni' => '12345678A', 'nombre' => 'Juan Pérez','planta' => 1, 'puerta' => 'A', 'cuota' => 20.00,'created_at' => now(), 'updated_at' => now()],
        ]);

        $propietario2 = DB::table('propietarios')->insert([
            ['dni' => '87654321B', 'nombre' => 'María García','planta' => 2, 'puerta' => 'B', 'cuota' => 30.00,'created_at' => now()->addWeekdays(4), 'updated_at' => now()],
        ]);

        // $numero = DB::table('propietarios')->where('id', $propietario1)->select('cuota')->get();


        // DB::table('ingresos')->insert([
        //     ['propietario_id' => $propietario1, 'anyo' => 2026,'mes' => 1,  'importe' => 75],
        // ]);

        // DB::table('ingresos')->insert([
        //     ['propietario_id' => $propietario1, 'anyo' => 2026,'mes' => 3,  'importe' => 75],
        // ]);
    }
}
