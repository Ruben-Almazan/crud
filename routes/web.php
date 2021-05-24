<?php

use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\TareaController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*Route::get('/tarea', [TareaController::class, 'index']);
Route::get('/tarea/create', [TareaController::class, 'create']);
Route::post('/tarea', [TareaController::class, 'store']);*/

Route::resource('tarea', TareaController::class);
//Route::resource('programa', ProgramaController::class);
