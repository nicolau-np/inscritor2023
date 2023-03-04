<?php

use App\Http\Controllers\api\EstudanteController;
use App\Http\Controllers\api\MunicipioController;
use App\Http\Controllers\api\PaisController;
use App\Http\Controllers\api\ProvinciaController;
use App\Http\Controllers\api\UserController;
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

Route::prefix('auth')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('provincias')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProvinciaController::class, 'index']);
});

Route::prefix('municipios')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [MunicipioController::class, 'index']);
    Route::get('/{provincia}', [MunicipioController::class, 'municipiosProvincia']);
});

Route::prefix('pais')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PaisController::class, 'index']);
});

Route::prefix('estudantes')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [EstudanteController::class, 'index']);
    Route::get('/{id}', [EstudanteController::class, 'show']);
    Route::post('/', [EstudanteController::class, 'store']);
    Route::put('/{id}', [EstudanteController::class, 'update']);
    Route::delete('/{id}', [EstudanteController::class, 'destroy']);
    Route::post('/search', [EstudanteController::class, 'search']);
});
