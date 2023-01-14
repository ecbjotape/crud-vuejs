<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TipoDeConsultaController;
use Illuminate\Support\Facades\Route;


Route::prefix('especialidades')->group(function () {
    Route::get('/', [EspecialidadeController::class, 'index']);
    Route::post('/create', [EspecialidadeController::class, 'create']);
    Route::post('/update', [EspecialidadeController::class, 'update']);
    Route::post('/delete', [EspecialidadeController::class, 'destroy']);
});

Route::prefix('tipo-de-consulta')->group(function () {
    Route::get('/', [TipoDeConsultaController::class, 'index']);
    Route::post('/create', [TipoDeConsultaController::class, 'create']);
    Route::post('/update', [TipoDeConsultaController::class, 'update']);
    Route::post('/delete', [TipoDeConsultaController::class, 'destroy']);
});

Route::prefix('paciente')->group(function () {
    Route::get('/', [PacienteController::class, 'index']);
    Route::post('/create', [PacienteController::class, 'create']);
    Route::post('/update', [PacienteController::class, 'update']);
    Route::post('/delete', [PacienteController::class, 'destroy']);
});

Route::prefix('medico')->group(function () {
    Route::get('/', [MedicoController::class, 'index']);
    Route::post('/create', [MedicoController::class, 'create']);
    Route::post('/update', [MedicoController::class, 'update']);
    Route::post('/delete', [MedicoController::class, 'destroy']);
});

Route::prefix('consulta')->group(function () {
    Route::get('/', [ConsultaController::class, 'index']);
    Route::post('/create', [ConsultaController::class, 'create']);
});
