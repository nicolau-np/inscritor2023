<?php

use App\Http\Controllers\AjaxRequestController;
use App\Http\Controllers\api\AnoLectivoController;
use App\Http\Controllers\api\BalancoController;
use App\Http\Controllers\api\ClasseController;
use App\Http\Controllers\api\CondicoesController;
use App\Http\Controllers\api\CursoController;
use App\Http\Controllers\api\EmolumentoController;
use App\Http\Controllers\api\EstudanteController;
use App\Http\Controllers\api\ExcelController;
use App\Http\Controllers\api\InstituicaoController;
use App\Http\Controllers\api\ListaController;
use App\Http\Controllers\api\ReportController;
use App\Http\Controllers\api\TurmaController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\api\EncerramentoActividadeController;
use App\Http\Controllers\StaticController;
use App\Models\Estudante;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;
use Illuminate\Support\Facades\Artisan;
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


Route::get('/', [HomeController::class, 'client']);
Route::get('consultar', [HomeController::class, 'consultar']);
Route::post('consultar', [HomeController::class, 'consultar']);

Route::get('home', [HomeController::class, 'home'])->middleware('auth')->name('home');

/**ajax request */
Route::prefix('request')->group(function () {
    Route::get('municipios/all/{id}', [AjaxRequestController::class, 'municipios']);
    Route::get('cursos/all/{id}', [AjaxRequestController::class, 'cursos']);
    Route::get('classes/all/{id}', [AjaxRequestController::class, 'classes']);
    Route::get('anos/all/{id}', [AjaxRequestController::class, 'anos']);
});


Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
    Route::get('logout', [UserController::class, 'logout'])->middleware('auth');
    Route::post('login', [UserController::class, 'logar']);
    Route::get('edit', [UserController::class, 'edit']);
    Route::post('edit', [UserController::class, 'editar']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('auth');
    Route::get('recuperar', [UserController::class, 'recuperar']);
    Route::post('recuperar', [UserController::class, 'recuperarStore']);
});

Route::prefix('estudantes')->middleware('auth')->group(function () {
    Route::get('create', [EstudanteController::class, 'create'])->middleware('auth.user');
    Route::post('search', [EstudanteController::class, 'search']);
    Route::post('/', [EstudanteController::class, 'store'])->middleware('auth.user');
    Route::get('edit/{id}', [EstudanteController::class, 'edit'])->middleware('auth.user');
    Route::put('/{id}', [EstudanteController::class, 'update'])->middleware('auth.user');
    Route::get('destroy/{id}', [EstudanteController::class, 'delete'])->middleware('auth.user');
    Route::get('/', [EstudanteController::class, 'index'])->middleware('auth.user');
    Route::get('/{id}', [EstudanteController::class, 'show'])->middleware('auth.user');
});

Route::prefix('instituicaos')->middleware('auth.manager')->group(function () {
    Route::get('/create', [InstituicaoController::class, 'create']);
    Route::post('/', [InstituicaoController::class, 'store']);
    Route::get('edit/{id}', [InstituicaoController::class, 'edit']);
    Route::put('/{id}', [InstituicaoController::class, 'update']);
    Route::get('destroy/{id}', [InstituicaoController::class, 'destroy']);
    Route::get('/', [InstituicaoController::class, 'index']);
    Route::get('/{id}', [InstituicaoController::class, 'show']);
    Route::get('/users/{id}', [InstituicaoController::class, 'users']);
    Route::put('/users/{id}', [InstituicaoController::class, 'usersStore']);
    Route::get('/users/reset_passe/{id}', [InstituicaoController::class, 'resetPasse']);
    Route::get('/users/destroy/{id}', [InstituicaoController::class, 'usersDestroy']);
});


Route::prefix('extras')->middleware('auth.manager')->group(function () {

    Route::prefix('cursos')->group(function () {
        Route::get('/create', [CursoController::class, 'create']);
        Route::post('/', [CursoController::class, 'store']);
        Route::get('edit/{id}', [CursoController::class, 'edit']);
        Route::put('/{id}', [CursoController::class, 'update']);
        Route::get('destroy/{id}', [CursoController::class, 'destroy']);
        Route::get('/', [CursoController::class, 'index']);
        Route::get('/{id}', [CursoController::class, 'show']);
    });

    Route::prefix('classes')->group(function () {
        Route::get('/create', [ClasseController::class, 'create']);
        Route::post('/', [ClasseController::class, 'store']);
        Route::get('edit/{id}', [ClasseController::class, 'edit']);
        Route::put('/{id}', [ClasseController::class, 'update']);
        Route::get('destroy/{id}', [ClasseController::class, 'destroy']);
        Route::get('/', [ClasseController::class, 'index']);
        Route::get('/{id}', [ClasseController::class, 'show']);
    });

    Route::prefix('turmas')->group(function () {
        Route::get('/create', [TurmaController::class, 'create']);
        Route::post('/', [TurmaController::class, 'store']);
        Route::get('edit/{id}', [TurmaController::class, 'edit']);
        Route::put('/{id}', [TurmaController::class, 'update']);
        Route::get('destroy/{id}', [TurmaController::class, 'destroy']);
        Route::get('/', [TurmaController::class, 'index']);
        Route::get('/{id}', [TurmaController::class, 'show']);
    });

    Route::prefix('condicaos')->group(function () {
        Route::get('/create', [CondicoesController::class, 'create']);
        Route::post('/', [CondicoesController::class, 'store']);
        Route::get('edit/{id}', [CondicoesController::class, 'edit']);
        Route::put('/{id}', [CondicoesController::class, 'update']);
        Route::get('destroy/{id}', [CondicoesController::class, 'destroy']);
        Route::get('/', [CondicoesController::class, 'index']);
        Route::get('/{id}', [CondicoesController::class, 'show']);
    });

    Route::prefix('emolumentos')->group(function () {
        Route::get('/create', [EmolumentoController::class, 'create']);
        Route::post('/', [EmolumentoController::class, 'store']);
        Route::get('edit/{id}', [EmolumentoController::class, 'edit']);
        Route::put('/{id}', [EmolumentoController::class, 'update']);
        Route::get('destroy/{id}', [EmolumentoController::class, 'destroy']);
        Route::get('/', [EmolumentoController::class, 'index']);
        Route::get('/{id}', [EmolumentoController::class, 'show']);
    });

    Route::prefix('ano_lectivos')->group(function () {
        Route::get('/create', [AnoLectivoController::class, 'create']);
        Route::post('/', [AnoLectivoController::class, 'store']);
        Route::get('edit/{id}', [AnoLectivoController::class, 'edit']);
        Route::put('/{id}', [AnoLectivoController::class, 'update']);
        Route::get('destroy/{id}', [AnoLectivoController::class, 'destroy']);
        Route::get('/', [AnoLectivoController::class, 'index']);
        Route::get('/{id}', [AnoLectivoController::class, 'show']);
    });
});

Route::prefix('usuarios')->middleware('auth.admin')->group(function(){
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('edit/{id}', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('destroy/{id}', [UserController::class, 'destroy']);
    Route::get('/reset_passe/{id}', [UserController::class, 'reset']);
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
});

Route::prefix('encerramento_actividades')->middleware('auth.admin')->group(function () {
    Route::get('/create', [EncerramentoActividadeController::class, 'create']);
    Route::post('/', [EncerramentoActividadeController::class, 'store']);
    Route::get('edit/{id}', [EncerramentoActividadeController::class, 'edit']);
    Route::put('/{id}', [EncerramentoActividadeController::class, 'update']);
    Route::get('destroy/{id}', [EncerramentoActividadeController::class, 'destroy']);
    Route::get('/', [EncerramentoActividadeController::class, 'index']);
    Route::get('/{id}', [EncerramentoActividadeController::class, 'show']);
});

Route::prefix('balancos')->middleware('auth.admin')->group(function () {
    Route::get('/', [BalancoController::class, 'index']);
    Route::post('/', [BalancoController::class, 'search']);
});

Route::prefix('listas')->middleware('auth.admin')->group(function () {
    Route::post('/', [ListaController::class, 'store']);
    Route::get('/', [ListaController::class, 'index']);
});

Route::prefix('pdf')->middleware('auth.admin')->group(function () {
    Route::get('listas/{id_curso}/{id_classe}/{id_ano_lectivo}/{estado}', [ReportController::class, 'listas']);
});

Route::prefix('excel')->middleware('auth.admin')->group(function () {
    Route::get('listas/{id_curso}/{id_classe}/{id_ano_lectivo}/{estado}', [ExcelController::class, 'listas']);
});

Route::get('/text', function () {
    $data = "2023-03-19";
    $data2 = "2023-04-02";
    $estudantes = Estudante::where(['id_instituicao' => 1, 'id_ano_lectivo' => 1])->whereDate('created_at', '>=', $data)->whereDate('created_at', '<=', $data2)->get();

    return $estudantes;
});

Route::get('/migrate', function(){
    $router = Artisan::call('route:clear');
    echo "router<br>";

    $clearrouter = Artisan::call('route:clear');
    echo "Route cleared<br>";

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('optimize');
    echo "Optimize cleared<br>";

    $migrate = Artisan::call('migrate:fresh');
    echo "migrate<br>";

    $seeder = Artisan::call('db:seed');
    echo "Seed<br>";
});
