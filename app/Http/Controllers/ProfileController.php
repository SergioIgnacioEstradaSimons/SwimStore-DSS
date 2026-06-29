<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Mostrar perfil
     */
    public function index()
    {
        return view('cliente.perfil');
    }

    /**
     * Actualizar nombre y apellido
     */
    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ]);

        return back()->with('success', 'Cuenta actualizada correctamente.');
    }

    /**
     * Eliminar cuenta
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'La contraseña es incorrecta.');
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Cuenta eliminada correctamente.');
    }
}
