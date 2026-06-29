<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Mostrar todos los usuarios
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Formulario de creación (no se usa en API)
     */
    public function create()
    {
        return response()->json([
            'message' => 'Formulario de creación'
        ]);
    }

    /**
     * Registrar usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => 2,
            'fecha' => now(),
            'estado' => 1,
        ]);

        // 🔥 FORZAR LOGIN CORRECTO
        Auth::login($user);   // 👈 ESTE ES EL IMPORTANTE

        // 🔥 regenerar sesión (MUY IMPORTANTE)
        $request->session()->regenerate();

        return redirect()->route('cliente.inicio');
    }

    /**
     * Mostrar un usuario
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Formulario de edición (no se usa en API)
     */
    public function edit(User $user)
    {
        return response()->json([
            'message' => 'Formulario de edición',
            'data' => $user
        ]);
    }

    /**
     * Actualizar usuario
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only([
            'nombre',
            'apellido',
            'email',
            'estado'
        ]));

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'data' => $user
        ]);
    }

    /**
     * Eliminar usuario
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ]);
    }
}
