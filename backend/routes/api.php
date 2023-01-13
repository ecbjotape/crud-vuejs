<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\TipoDeConsultaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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

Route::prefix('medico')->group(function () {
    Route::get('/', [MedicoController::class, 'index']);
    Route::post('/create', [MedicoController::class, 'create']);
    Route::post('/update', [MedicoController::class, 'update']);
    Route::post('/delete', [MedicoController::class, 'destroy']);
});

Route::prefix('paciente')->group(function () {
    Route::get('/', [MedicoController::class, 'index']);
    Route::post('/create', [MedicoController::class, 'create']);
    Route::post('/update', [MedicoController::class, 'update']);
    Route::post('/delete', [MedicoController::class, 'destroy']);
});
