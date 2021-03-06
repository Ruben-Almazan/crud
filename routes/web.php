<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
//use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('inicio', function(){
    return view('inicio');
});

Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('programa/{programa}/agrega-prestador', [ProgramaController::class, 'agregaPrestador'])->name('programa.agrega-prestador');
Route::resource('programa', ProgramaController::class)->middleware('verified');
Route::get('asistencia/entrada', [AsistenciaController::class, 'formEntrada'])->name('asistencia.formEntrada');
Route::post('asistencia/entrada', [AsistenciaController::class, 'registrarEntrada'])->name('asistencia.registrarEntrada');

Route::get('asistencia/salida', [AsistenciaController::class, 'formSalida'])->name('asistencia.formSalida');
Route::post('asistencia/salida/{asistencia}', [AsistenciaController::class, 'registrarSalida'])->name('asistencia.registrarSalida');

Route::resource('archivo', ArchivoController::class)->except('update', 'show');
Route::get('archivo/descargar/{archivo}', [ArchivoController::class, 'descargar'])->name('archivo.descargar');

Route::get('/pdf', 'PDFController@PDF')->name('descargarPDF');

/*Route::get('/tarea', [TareaController::class, 'index']);
Route::get('/tarea/create', [TareaController::class, 'create']);
Route::post('/tarea', [TareaController::class, 'store']);*/

//Route::resource('tarea', TareaController::class);
//Route::resource('programa', ProgramaController::class);
