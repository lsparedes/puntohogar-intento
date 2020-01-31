<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class tipos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $amoblados = [
            [1, 'Si'],
            [2, 'No'],
        ];


        $amoblados = array_map(function ($amoblado) use ($now) {
            return [
                'id' => $amoblado[0],
                'amoblados' => $amoblado[1],

                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $amoblados);
        \DB::table('tipo_amoblados')->insert($amoblados);

        $propiedades = [
            [1, 'Casa'],
            [2, 'Departamento']
        ];


        $propiedades = array_map(function ($propiedad) use ($now) {
            return [
                'id' => $propiedad[0],
                'propiedades' => $propiedad[1],

                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $propiedades);
        \DB::table('tipo_propiedades')->insert($propiedades);



        $pisos = [
            [1, 'Flotante'],
            [2, 'Cemento'],
            [3, 'Madera'],
            [4, 'Marmol'],
            [5, 'Ceramicos'],
            [6, 'Alfombrado'],
        ];
        $pisos = array_map(function ($piso) use ($now) {
            return [
                'id' => $piso[0],
                'pisos' => $piso[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $pisos);
        \DB::table('tipo_pisos')->insert($pisos);

        $financiamientos = [
            [1, 'Contado'],
            [2, 'Subsidio'],
            [3, 'Leasing'],
            [4, 'Credito Hipotecario'],
        ];
        $financiamientos = array_map(function ($financiamiento) use ($now) {
            return [
                'id' => $financiamiento[0],
                'financiamientos' => $financiamiento[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $financiamientos);

        \DB::table('tipo_financiamientos')->insert($financiamientos);


         $permisos = [
            [1, 'all'],
            [2, 'publicar']
        ];


        $permisos = array_map(function ($permiso) use ($now) {
            return [
                'id' => $permiso[0],
                'tipo_permisos' => $permiso[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $permisos);
        \DB::table('permisos')->insert($permisos);

         $roles = [
            [1, 'admin',1],
            [2, 'user',2],

        ];


        $roles = array_map(function ($rol) use ($now) {
            return [
                'id' => $rol[0],
                'tipo_roles' => $rol[1],
                'permisos_id' => $rol[2],

                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $roles);
        \DB::table('roles')->insert($roles);
         DB::table('users')->insert([
            'name' => Str::random(10),
            'segundo_nombre' => Str::random(10),
            'apellido_paterno' => Str::random(10),
            'apellido_materno' => Str::random(10),
            'email' => 'admin@admin',
            'roles_id' => 1,
            'password' => bcrypt('admin'),
            'updated_at' => $now,
            'created_at' => $now,
        ]);


    }
}
