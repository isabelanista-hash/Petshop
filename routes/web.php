<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ServicoController;

Route::resource('cliente', ClienteController::class);

Route::resource('animal', AnimalController::class);

Route::resource('servico', ServicoController::class);
