<?php

use App\Http\Controllers\PersonasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\CarreraController;


Route::get('/', function () {
    return view('layouts.template');
});
Route::resource("personas",PersonasController::Class);
Route::resource("estado_civil",EstadoCivilController::Class);
Route::resource("carreras",CarreraController::Class);
