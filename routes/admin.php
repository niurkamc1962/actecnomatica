<?php

use App\Http\Controllers\Admin\EmpresaspkiController;
Use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\CategoriaspkiController;
use App\Http\Controllers\Admin\DatospkiController;
use App\Http\Controllers\Admin\PermisosController;


//HOME ADMIN
Route::middleware('adminpki')->get('',[Admin\HomeController::class,'index'])->name('admin.home');
//Route::get('',[Admin\HomeController::class,'index'])->name('admin.home');


//ROLES
//aplicando el middleware para que solo sea el superadministrador
Route::group(['middleware' => 'adminroles'] , function() {
    Route::resource('roles',Admin\RoleController::class)->names('admin.roles');
});

//PERMISOS
//aplicando el middleware para que solo sea el superadministrador
/*Route::group(['middleware' => 'adminroles'] , function() {
    Route::resource('permisos',Admin\PermisosController::class)->names('admin.permisos');
});*/

//EMPRESASPKI
Route::resource('empresaspki',EmpresaspkiController::class)->names('admin.empresaspki');

//CATEGORIASPKI
Route::resource('categoriaspki',CategoriaspkiController::class)->names('admin.categoriaspki');

//DATOSPKI
/*Route::resource('datospki',DatospkiController::class)->names('admin.datospki');*/
Route::get('eliminaficheropki/{id}/{tipo}',[DatospkiController::class,'eliminaficheropki'])->name('admin.datospki.eliminaficheropki');
Route::get('datospki/index',[DatospkiController::class,'index'])->name('admin.datospki.index');
Route::get('datospki/create',[DatospkiController::class,'create'])->name('admin.datospki.create');
Route::post('datospki/store',[DatospkiController::class,'store'])->name('admin.datospki.store');
Route::get('datospki/show/{id}',[DatospkiController::class,'show'])->name('admin.datospki.show');
Route::get('datospki/edit/{id}',[DatospkiController::class,'edit'])->name('admin.datospki.edit');
Route::patch('datospki/update/{id}',[DatospkiController::class,'update'])->name('admin.datospki.update');
Route::delete('datospki/destroy/{id}',[DatospkiController::class,'destroy'])->name('admin.datospki.destroy');


//USUARIOS REPRESENTANTES ASPIRANTES TITULARES USUARIOSNOPKI
Route::resource('users',UserController::class)->names('admin.users');
Route::get('usuariospki',[\App\Http\Controllers\Admin\UserController::class,'usuariospki'])->name('admin.users.usuariospki');
Route::get('representantespki',[\App\Http\Controllers\Admin\UserController::class,'representantespki'])->name('admin.users.representantespki');
Route::get('aspirantespki',[\App\Http\Controllers\Admin\UserController::class,'aspirantespki'])->name('admin.users.aspirantespki');
Route::get('titularespki',[\App\Http\Controllers\Admin\UserController::class,'titularespki'])->name('admin.users.titularespki');
Route::get('pendientespki',[\App\Http\Controllers\Admin\UserController::class,'pendientespki'])->name('admin.users.pendientespki');
Route::get('pdfpki',[UserController::class,'pdfpki'])->name('admin.users.pdfpki');

//adicionado en octubre 2022
Route::get('usuariosnopki',[\App\Http\Controllers\Admin\UserController::class,'usuariosnopki'])->name('admin.users.usuariosnopki');

//septiembre/2022
//Ruta para todos los tipos de usuarios pki
Route::get('todospki',[\App\Http\Controllers\Admin\UserController::class,'todospki'])->name('admin.users.todospki');

//CAMBIO ROLES DESDE FICHERO CSV(sept/oct/2022)
Route::get('cambiarolespki',[\App\Http\Controllers\Admin\UserController::class, 'cambiarolespki'])->name('admin.users.cambiarolespki');

