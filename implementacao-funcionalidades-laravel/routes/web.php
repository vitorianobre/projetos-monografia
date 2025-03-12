<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtividadeController;

Route::get('/', [AtividadeController::class, 'index'])->name('atividades.index');
Route::get('/cadastrar', [AtividadeController::class, 'create'])->name('atividades.create');
Route::post('/cadastrar', [AtividadeController::class, 'store'])->name('atividades.store');
Route::get('/atividades/{id}', [AtividadeController::class, 'show'])->name('atividades.show');
Route::get('/download/{id}', [AtividadeController::class, 'download'])->name('atividade.download');
