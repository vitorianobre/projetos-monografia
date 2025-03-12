<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;

Route::resource('contatos', ContatosController::class);
