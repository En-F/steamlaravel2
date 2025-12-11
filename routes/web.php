<?php

use App\Http\Controllers\DesarrolladoraController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('videojuegos',VideojuegoController::class);
Route::resource('desarrolladoras',DesarrolladoraController::class);
Route::resource('editoras',EditoraController::class);
Route::resource('generos',GeneroController::class);