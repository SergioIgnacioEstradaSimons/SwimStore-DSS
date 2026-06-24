<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'correo' => 'juan@correo.com',
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Gomez',
                'correo' => 'maria@correo.com',
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Lopez',
                'correo' => 'carlos@correo.com',
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Martinez',
                'correo' => 'ana@correo.com',
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Fernandez',
                'correo' => 'luis@correo.com',
            ],
            [
                'nombre' => 'Sofia',
                'apellido' => 'Rojas',
                'correo' => 'sofia@correo.com',
            ],
            [
                'nombre' => 'Pedro',
                'apellido' => 'Vargas',
                'correo' => 'pedro@correo.com',
            ],
            [
                'nombre' => 'Lucia',
                'apellido' => 'Mendoza',
                'correo' => 'lucia@correo.com',
            ],
            [
                'nombre' => 'Diego',
                'apellido' => 'Flores',
                'correo' => 'diego@correo.com',
            ],
            [
                'nombre' => 'Valeria',
                'apellido' => 'Torrez',
                'correo' => 'valeria@correo.com',
            ],
        ];
        foreach ($usuarios as $usuario) {
            User::create([
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'correo' => $usuario['correo'],
                'password' => Hash::make('12345678'),
                'fecha' => now(),
                'estado' => true,
            ]);
        }
    }
}
