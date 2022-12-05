<?php

use App\Http\Controllers\fichaController;
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
use App\Http\Controllers\treinoController;

use App\Http\Controllers\EventController;
Route::group(['middleware' => ['web']], function () {
    return view('index');
});

Route::get('/', [EventController::class, 'index']);
Route::delete('/treino/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/ficha/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/ficha/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::get('/treino/edit/{id}', [EventController::class, 'edit'])->middleware('auth');

Route::get('/ficha/create', [fichaController::class, 'create']);
Route::get('/ficha/{id}' ,[fichaController::class, 'treino_create']);//cria treinos ficha
Route::post('/ficha', [fichaController::class, 'store']);
Route::post('/treinos/inserir/{id}', [treinoController::class, 'store'])->middleware('auth');
Route::post('/exercicio/{id}', [fichaController::class, 'store']);
Route::get('/tipo_treino/{id}', [tipo_treinoController::class, 'store']);




Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/ficha/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/ficha/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
