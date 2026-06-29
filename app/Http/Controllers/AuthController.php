<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Mostrar formulario
    public function index()
    {
        return view('login');
    }

    //Iniciar sesión
    public function login(Request $request)
    {
        
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales)) {
            

            $request->session()->regenerate();
            

            $usuario = Auth::user();

            //============== ADMINISTRADOR ==================

            if ($usuario->roles_id == 2) {

                //<<<<<<<<<<<<<<<<<
                //PON AQUÍ LA RUTA DEL ADMINISTRADOR
                return redirect()->route('administrador.inicio');
                //>>>>>>>>>>>>>>>>>

            }

            //============== CLIENTE ==================

            if ($usuario->roles_id == 1) {

                //<<<<<<<<<<<<<<<<<
                //PON AQUÍ LA RUTA DEL CLIENTE
                return redirect()->route('cliente.inicio');
                //>>>>>>>>>>>>>>>>>

            }

            Auth::logout();

            return redirect('/login');

        }

        return back()->withErrors([
            'email' => 'Correo o contraseña incorrectos.'
        ])->onlyInput('email');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
