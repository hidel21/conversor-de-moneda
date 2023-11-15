<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\CurrencyConverter; // Asumiendo que tienes un componente para esto

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Autenticación
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// Proteger rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    // Conversor de Monedas
    Route::get('/converter', CurrencyConverter::class)->name('converter');

    // Otras rutas protegidas
    // Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // ... más rutas ...
});

// Ruta de cierre de sesión (logout)
Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');
