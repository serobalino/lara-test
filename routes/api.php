<?php

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

Route::resource('empresas',\App\Http\Controllers\EmpresasController::class);
Route::resource('departamentos',\App\Http\Controllers\DepartamentosController::class);
Route::resource('cargos',\App\Http\Controllers\CargosController::class);

Route::post("heroku",[\App\Http\Controllers\ErroresHookController::class,'herokuEmail']);
Route::post("github",[\App\Http\Controllers\ErroresHookController::class,'githubAction']);
Route::get("logs",[\App\Http\Controllers\LogAppController::class,'lista']);
Route::get("log/{device}",[\App\Http\Controllers\LogAppController::class,'consultar'])->name('logdevice');
Route::post("log",[\App\Http\Controllers\LogAppController::class,'guardar']);
Route::get('downloadArtifact/{url}',[\App\Http\Controllers\ConsultaCommit::class,'descargaGH'])->name('downloadGH');
