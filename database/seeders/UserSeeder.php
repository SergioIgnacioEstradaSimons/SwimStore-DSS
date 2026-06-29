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
                'roles_id' => 1,
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'email' => 'juan@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Maria',
                'apellido' => 'Gomez',
                'email' => 'maria@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Carlos',
                'apellido' => 'Lopez',
                'email' => 'carlos@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Ana',
                'apellido' => 'Martinez',
                'email' => 'ana@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Luis',
                'apellido' => 'Fernandez',
                'email' => 'luis@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Sofia',
                'apellido' => 'Rojas',
                'email' => 'sofia@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Pedro',
                'apellido' => 'Vargas',
                'email' => 'pedro@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Lucia',
                'apellido' => 'Mendoza',
                'email' => 'lucia@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Diego',
                'apellido' => 'Flores',
                'email' => 'diego@correo.com',
            ],
            [
                'roles_id' => 1,
                'nombre' => 'Valeria',
                'apellido' => 'Torrez',
                'email' => 'valeria@correo.com',
            ],
            [
                'roles_id' => 2,
                'nombre' => 'Sergio',
                'apellido' => 'Estrada',
                'email' => 'sergio@correo.com',
            ],
        ];
        foreach ($usuarios as $usuario) {
            User::create([
                'roles_id' => $usuario['roles_id'],
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'email' => $usuario['email'],
                'password' => Hash::make('12345678'),
                'fecha' => now(),
                'estado' => true,
            ]);
        }
    }
}
