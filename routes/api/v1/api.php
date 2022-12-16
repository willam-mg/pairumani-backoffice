<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ClienteController;
use App\Http\Controllers\api\v1\ReservaController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\HabitacionController;
use App\Http\Controllers\api\v1\HelpersController;
use App\Http\Controllers\api\v1\HomeController;
use App\Http\Controllers\api\v1\TransporteController;

// Sliders and Eventos
Route::get('sliders', [HomeController::class, 'sliders']);
Route::get('eventos', [HomeController::class, 'eventos']);

// Helpers
Route::post('reserva/helpers/total', [HelpersController::class, 'calcularTotal']);

// Authentication
Route::post('login', [AuthController::class,'login']);
Route::post('signup', [AuthController::class,'signup']);
Route::post('verificaremail', [AuthController::class,'sendCode']);
Route::post('verificarcodigo', [AuthController::class,'validateCode']);
Route::post('cambiarpassword', [AuthController::class,'cambiarpassword']);

// Habitaciones
Route::get('habitacioncategorias',[HabitacionController::class,'habitacioncategorias']);
Route::post('habitaciones',[HabitacionController::class,'habitaciones']);
Route::post('habitaciondetalle',[HabitacionController::class,'habitaciondetalle']);
Route::get('Habitacionescategoria',[HabitacionController::class,'Habitacionescategoria']);
Route::get('promociones',[HabitacionController::class,'promociones']);

// transportes
Route::get('transportes',[TransporteController::class,'transportes']);
Route::post('transportedetalle',[TransporteController::class, 'transportedetalle']);
Route::post('reservatransporte', [TransporteController::class, 'reservatransporte'])->middleware(['auth:cliente-api']);

// lugares turisticos
Route::get('lugaresgastronomia',[ClienteController::class,'lugaresgastronomia']);
Route::get('lugaresturismo',[ClienteController::class,'lugaresturismo']);
Route::post('turismodetalle',[ClienteController::class,'turismodetalle']);

// retaurante
Route::get('restaurantecategorias',[ClienteController::class,'restaurantecategorias']);
Route::post('restauranteproductos',[ClienteController::class,'restauranteproductos']);
Route::post('productodetalle',[ClienteController::class,'productodetalle']);

// cafeteria
Route::get('cafeteriacategorias', [ClienteController::class, 'cafeteriacategorias']);
Route::post('cafeteriaproductos', [ClienteController::class, 'cafeteriaproductos']);
Route::post('cafeteriaproductodetalle', [ClienteController::class, 'cafeteriaproductodetalle']);

// Cliente
Route::post('perfil', [ClienteController::class, 'perfil']);
Route::post('update', [ClienteController::class, 'update']);
Route::group(['middleware' => 'auth:cliente-api'],function(){
    // reservas
    Route::post('reservahabitacion',[ClienteController::class,'reservahabitacion']);
    Route::post('misreservas',[ClienteController::class,'misreservas']);
    Route::post('mishospedajes',[ClienteController::class,'mishospedajes']);
    Route::post('mishospedajesocupados',[ClienteController::class,'mishospedajesocupados']);
    
    Route::post('reservalugarturistico',[ClienteController::class,'reservalugarturistico']);
    Route::post('reservarestaurante',[ClienteController::class,'reservarestaurante']);
    Route::post('reservacafeteria',[ClienteController::class,'reservacafeteria']);
});


