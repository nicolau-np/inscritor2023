<?php

use App\Http\Controllers\api\EstudanteController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('home', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
    Route::get('logout', [UserController::class, 'logout'])->middleware('auth');
    Route::post('login', [UserController::class, 'logar']);
});

Route::prefix('estudantes')->group(function () {
    Route::get('/create', [EstudanteController::class, 'create']);
    Route::post('/', [EstudanteController::class, 'store']);
    Route::get('edit/{id}', [EstudanteController::class, 'edit']);
    Route::put('/{id}', [EstudanteController::class, 'update']);
    Route::get('delete/{id}', [EstudanteController::class, 'delete']);
    Route::get('/', [EstudanteController::class, 'index']);
    Route::get('/{id}', [EstudanteController::class, 'show']);
});