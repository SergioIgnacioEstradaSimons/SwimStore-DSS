<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('users', UserController::class);


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('administrador')->name('administrador.')->middleware('auth')->group(function () {

    Route::get('/inicio', function () {
        return view('administrador.inicioAdministrador');
    })->name('inicio');

    Route::resource('categorias', CategoriesController::class);
     Route::resource('productos', ProductsController::class);

    Route::post('productos/{id}/toggle', [ProductsController::class, 'toggle'])
        ->name('productos.toggle');
});