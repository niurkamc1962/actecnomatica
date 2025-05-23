<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactanosController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

//ADICIONANDO LAS RUTAS PARA LA CONFIRMACION DE CORREO
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/', function () {
    return view('dashboard');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('dashboard');
})->name('dashboard');

//CONTACTANOS, CORREO NOTIFICACION CONTACTANOS
Route::get('contactanos',[ContactanosController::class,'index'])->name('contactanos');
Route::post('contactanos',[ContactanosController::class,'enviarCorreo'])->name('enviar_correo');

//REGISTRO USUARIO, FORMULARIO PREVIO, ENVIO CORREO SOLICITUD SERVICIO
Route::get('solicitar-registro', \App\Http\Livewire\PkiSolicitudRegistro::class)->name('solicitar_registro');
Route::post('registrar-usuario',[\App\Http\Controllers\Admin\UserController::class, 'registrarUsuario'])->name('registrar-usuario');
Route::get('solicitar-confirmacion', \App\Http\Livewire\PkiSolicitudConfirmacion::class)->name('solicitar_confirmacion');
//Route::get('enviar-solicitud', \App\Http\Livewire\PkiSolicitud::class, 'enviarSolicitud')->name('enviar-solicitud');
Route::get('/enviar-notificacion',[\App\Http\Controllers\Admin\UserController::class,'enviarNotificacionRole'])->name('enviar-notificacion-role');



