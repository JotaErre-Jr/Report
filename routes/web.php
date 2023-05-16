<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\relatoriosController;

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
Route::get('/index', [relatoriosController::class, 'index'])->name('index');

// Route::get('/getId', [relatoriosController::class, 'getId'])->name('getId');

Route::post('/executar', [relatoriosController::class, 'executarJasper'])->name('executar');

Route::get('/', function () {
    return view('welcome');
});
