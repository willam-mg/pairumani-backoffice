<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;

// Route::group(['middleware' => ['auth','permisos']], function () {
Route::group(['middleware' => ['auth']], function () {
    //RUTAS ROLES
    Route::get('roles', [RolController::class, 'index'])->name('roles_index');
    Route::get('roles/reporte', [RolController::class, 'pdf'])->name('roles_reporte');
    Route::get('roles/create', [RolController::class, 'create'])->name('roles_create');
    Route::post('roles/create', [RolController::class, 'store'])->name('roles_create');
    Route::get('roles/{rol}', [RolController::class, 'show'])->name('roles_show');
    Route::get('roles/{rol}/edit', [RolController::class, 'edit'])->name('roles_edit');
    Route::post('roles/{rol}/edit', [RolController::class, 'update'])->name('roles_edit');
    Route::delete('roles/{rol}', [RolController::class, 'destroy'])->name('roles_destroy');
    Route::get('roles/{rol}/permisos', [RolController::class, 'getrolpermisos'])->name('roles_permisos');
    Route::post('roles/{rol}/permisos', [RolController::class, 'postrolpermisos'])->name('roles_permisos');

    //RUTAS USUARIOS
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios_index');
    Route::get('usuarios/pdf', [UsuarioController::class, 'pdf'])->name('usuarios_reporte');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios_create');
    Route::post('usuarios/create', [UsuarioController::class, 'store'])->name('usuarios_create');
    Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios_edit');
    Route::post('usuarios/{usuario}/edit', [UsuarioController::class, 'update'])->name('usuarios_edit');
    Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios_destroy');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/{slug?}', [HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
