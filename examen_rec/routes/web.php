<?php

use App\Http\Controllers\GastoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\PropietarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    //Para hacerlo a mano tengo que poner el ::get
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});


Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('email');
})->name('login.perform');


Route::resource('propietarios', PropietarioController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('gastos', GastoController::class);

Route::get('/deudas/{anyo}/{mes}',[IngresoController::class, 'deudas'])->name('igresos.deudas');
