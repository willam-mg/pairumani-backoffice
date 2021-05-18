<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;

Route::post('login', [ClienteController::class,'login']);
Route::post('signup', [ClienteController::class,'signup']);
Route::post('perfil', [ClienteController::class,'perfil']);
Route::post('update', [ClienteController::class,'update']);
Route::post('verificaremail', [ClienteController::class,'verificaremail']);
Route::post('verificarcodigo', [ClienteController::class,'verificarcodigo']);
Route::post('cambiarpassword', [ClienteController::class,'cambiarpassword']);

Route::group(['middleware' => 'auth:cliente-api'],function(){
    Route::get('sliders',[ClienteController::class,'sliders']);
    Route::get('habitacioncategorias',[ClienteController::class,'habitacioncategorias']);
    Route::post('habitaciones',[ClienteController::class,'habitaciones']);
    Route::post('habitaciondetalle',[ClienteController::class,'habitaciondetalle']);
    Route::get('Habitacionescategoria',[ClienteController::class,'Habitacionescategoria']);
    Route::get('promociones',[ClienteController::class,'promociones']);
    Route::get('transportes',[ClienteController::class,'transportes']);
    Route::get('eventos',[ClienteController::class,'eventos']);
    Route::get('lugaresgastronomia',[ClienteController::class,'lugaresgastronomia']);
    Route::get('lugaresturismo',[ClienteController::class,'lugaresturismo']);
    Route::post('turismodetalle',[ClienteController::class,'turismodetalle']);
    Route::get('restaurantecategorias',[ClienteController::class,'restaurantecategorias']);
    Route::post('restauranteproductos',[ClienteController::class,'restauranteproductos']);
    Route::post('productodetalle',[ClienteController::class,'productodetalle']);
    Route::post('reservahabitacion',[ClienteController::class,'reservahabitacion']);
});
