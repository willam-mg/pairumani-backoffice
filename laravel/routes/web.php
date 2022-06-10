<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\OpcionController;
use App\Http\Controllers\Admin\TamanoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\ReservaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\HospedajeController;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\Admin\HabitacionController;
use App\Http\Controllers\Admin\TransporteController;
use App\Http\Controllers\Admin\AcompananteController;
use App\Http\Controllers\Admin\CafeteriaCategoriaController;
use App\Http\Controllers\Admin\CafeteriaController;
use App\Http\Controllers\Admin\CafeteriaOpcionController;
use App\Http\Controllers\Admin\CafeteriaProductoController;
use App\Http\Controllers\Admin\CafeteriaTamanoController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Controllers\Admin\LugarTuristicoController;
use App\Http\Controllers\Admin\PromocionReservaController;
use App\Http\Controllers\Admin\HabitacionFrigobarController;
use App\Http\Controllers\Admin\HabitacionCategoriaController;
use App\Http\Controllers\Admin\RestauranteProductoController;
use App\Http\Controllers\Admin\RestauranteCategoriaController;
use App\Http\Controllers\Admin\LugarTuristicoReservaController;

// Route::group(['middleware' => ['auth','permisos']], function () {
Route::group(['middleware' => ['auth']], function () {

    
    //RUTAS CLIENTES
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes_index');
    Route::get('clientes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{promocion?}', [ClienteController::class, 'create'])->name('clientes_create');
    Route::post('clientes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{promocion?}', [ClienteController::class, 'store'])->name('clientes_create');
    Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes_show');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes_edit');
    Route::post('clientes/{cliente}/edit', [ClienteController::class, 'update'])->name('clientes_edit');
    Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes_destroy');

    //RUTAS ACOMPAÑANTES
    Route::get('clientes/{cliente}/acompanantes',[AcompananteController::class,'index'])->name('acompanantes_index');
    Route::get('clientes/{cliente}/acompanantes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{hospedaje?}/{promocion?}', [AcompananteController::class, 'create'])->name('acompanantes_create');
    Route::post('clientes/{cliente}/acompanantes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{hospedaje?}/{promocion?}', [AcompananteController::class, 'store'])->name('acompanantes_create');
    Route::get('clientes/{cliente}/acompanantes/{acompanante}', [AcompananteController::class, 'show'])->name('acompanantes_show');
    Route::get('clientes/{cliente}/acompanantes/{acompanante}/edit', [AcompananteController::class, 'edit'])->name('acompanantes_edit');
    Route::post('clientes/{cliente}/acompanantes/{acompanante}/edit', [AcompananteController::class, 'update'])->name('acompanantes_edit');
    Route::delete('clientes/{cliente}/acompanantes/{acompanante}', [AcompananteController::class, 'destroy'])->name('acompanantes_destroy');

    //RUTAS EVENTOS
    Route::get('eventos', [EventoController::class, 'index'])->name('eventos_index');
    Route::get('eventos/create', [EventoController::class, 'create'])->name('eventos_create');
    Route::post('eventos/create', [EventoController::class, 'store'])->name('eventos_create');
    Route::get('eventos/{evento}', [EventoController::class, 'show'])->name('eventos_show');
    Route::get('eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos_edit');
    Route::post('eventos/{evento}/edit', [EventoController::class, 'update'])->name('eventos_edit');
    Route::get('eventos/{evento}/fotos', [EventoController::class, 'fotos'])->name('eventos_galeria');
    Route::post('eventos/{evento}/fotos', [EventoController::class, 'fotosstore'])->name('eventos_galeria');
    Route::delete('eventos/{evento}/fotos/{galeria}', [EventoController::class, 'fotosdelete'])->name('eventos_galeria_destroy');
    Route::delete('eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos_destroy');

    //RUTAS CATEGORIAS HABITACIONES
    Route::get('habitacioncategorias', [HabitacionCategoriaController::class, 'index'])->name('habitacioncategorias_index');
    Route::get('habitacioncategorias/create', [HabitacionCategoriaController::class, 'create'])->name('habitacioncategorias_create');
    Route::post('habitacioncategorias/create', [HabitacionCategoriaController::class, 'store'])->name('habitacioncategorias_create');
    Route::get('habitacioncategorias/{categoria}', [HabitacionCategoriaController::class, 'show'])->name('habitacioncategorias_show');
    Route::get('habitacioncategorias/{categoria}/edit', [HabitacionCategoriaController::class, 'edit'])->name('habitacioncategorias_edit');
    Route::post('habitacioncategorias/{categoria}/edit', [HabitacionCategoriaController::class, 'update'])->name('habitacioncategorias_edit');
    Route::delete('habitacioncategorias/{categoria}', [HabitacionCategoriaController::class, 'destroy'])->name('habitacioncategorias_destroy');

    //RUTAS HABITACIONES
    Route::get('habitacioncategorias/{categoria}/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones_index');
    Route::get('habitacioncategorias/{categoria}/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones_create');
    Route::post('habitacioncategorias/{categoria}/habitaciones/create', [HabitacionController::class, 'store'])->name('habitaciones_create');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}', [HabitacionController::class, 'show'])->name('habitaciones_show');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/edit', [HabitacionController::class, 'edit'])->name('habitaciones_edit');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/edit', [HabitacionController::class, 'update'])->name('habitaciones_edit');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/fotos', [HabitacionController::class, 'fotos'])->name('habitaciones_galeria');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/fotos', [HabitacionController::class, 'fotosstore'])->name('habitaciones_galeria');
    Route::delete('habitacioncategorias/{categoria}/habitaciones/{habitacion}/fotos/{galeria}', [HabitacionController::class, 'fotosdelete'])->name('habitaciones_galeria_destroy');
    Route::delete('habitacioncategorias/{categoria}/habitaciones/{habitacion}', [HabitacionController::class, 'destroy'])->name('habitaciones_destroy');

    //RUTAS HABITACIONES RESERVAS
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas', [ReservaController::class, 'index'])->name('reservas_index');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/create/{cliente?}', [ReservaController::class, 'create'])->name('reservas_create');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/create/{cliente?}', [ReservaController::class, 'store'])->name('reservas_create');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas_show');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/hospedaje', [ReservaController::class, 'hospedaje'])->name('reservas_hospedaje');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/hospedaje', [ReservaController::class, 'hospedajestore'])->name('reservas_hospedaje');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas_edit');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/edit', [ReservaController::class, 'update'])->name('reservas_edit');
    Route::delete('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas_destroy');

    //RUTAS HABITACION FRIGOBAR
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar', [HabitacionFrigobarController::class, 'index'])->name('habitacionfrigobar_index');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/create', [HabitacionFrigobarController::class, 'create'])->name('habitacionfrigobar_create');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/create', [HabitacionFrigobarController::class, 'store'])->name('habitacionfrigobar_create');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/{frigobar}', [HabitacionFrigobarController::class, 'show'])->name('habitacionfrigobar_show');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/{frigobar}/edit', [HabitacionFrigobarController::class, 'edit'])->name('habitacionfrigobar_edit');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/{frigobar}/edit', [HabitacionFrigobarController::class, 'update'])->name('habitacionfrigobar_edit');
    Route::delete('habitacioncategorias/{categoria}/habitaciones/{habitacion}/frigobar/{frigobar}', [HabitacionFrigobarController::class, 'destroy'])->name('habitacionfrigobar_destroy');

    
    //RUTAS HOSPEDAJES
    Route::get('hospedajes', [HospedajeController::class, 'index'])->name('hospedajes_index');
    Route::get('hospedajes/create/{cliente?}', [HospedajeController::class, 'create'])->name('hospedajes_create');
    Route::post('hospedajes/create/{cliente?}', [HospedajeController::class, 'store'])->name('hospedajes_create');
    Route::get('hospedajes/{hospedaje}/edit', [HospedajeController::class, 'edit'])->name('hospedajes_edit');
    Route::post('hospedajes/{hospedaje}/edit', [HospedajeController::class, 'update'])->name('hospedajes_edit');
    Route::get('hospedajes/{hospedaje}/reservalugar', [HospedajeController::class, 'lugar'])->name('hospedajes_reserva_lugar');
    Route::post('hospedajes/{hospedaje}/reservalugar', [HospedajeController::class, 'lugarstore'])->name('hospedajes_reserva_lugar');
    Route::get('hospedajes/{hospedaje}/reservaproductos', [HospedajeController::class, 'productos'])->name('hospedajes_reserva_productos');
    Route::post('hospedajes/{hospedaje}/reservaproductos', [HospedajeController::class, 'productosstore'])->name('hospedajes_reserva_productos');
    Route::get('hospedajes/{hospedaje}/opciones/{id}', [HospedajeController::class, 'opciones'])->name('hospedajes_opciones');
    Route::get('hospedajes/{hospedaje}/tamanos/{id}', [HospedajeController::class, 'tamanos'])->name('hospedajes_tamanos');
    Route::get('hospedajes/{hospedaje}/reservacafeteriaproductos', [HospedajeController::class, 'cafeteriaproductos'])->name('hospedajes_reserva_cafeteria_productos');
    Route::post('hospedajes/{hospedaje}/reservacafeteriaproductos', [HospedajeController::class, 'cafeteriaproductosstore'])->name('hospedajes_reserva_cafeteria_productos');
    Route::get('hospedajes/{hospedaje}/cafeteriaopciones/{id}', [HospedajeController::class, 'cafeteriaopciones'])->name('hospedajes_cafeteria_opciones');
    Route::get('hospedajes/{hospedaje}/cafeteriatamanos/{id}', [HospedajeController::class, 'cafeteriatamanos'])->name('hospedajes_cafeteria_tamanos');
    Route::post('hospedajes/promocion/{id}', [HospedajeController::class, 'promocion'])->name('hospedajes_promocion');
    Route::post('hospesajes/acompanante/{id}', [HospedajeController::class, 'acompanante'])->name('hospedajes_acompanante');
    Route::get('hospedajes/{hospedaje}', [HospedajeController::class, 'show'])->name('hospedajes_show');
    Route::get('hospedajes/{hospedaje}/transporte', [HospedajeController::class, 'transporte'])->name('hospedajes_transporte');
    Route::post('hospedajes/{hospedaje}/transporte', [HospedajeController::class, 'transportestore'])->name('hospedajes_transporte');
    Route::get('hospedajes/{hospedaje}/frigobar', [HospedajeController::class, 'frigobar'])->name('hospedajes_frigobar');
    Route::post('hospedajes/{hospedaje}/frigobar', [HospedajeController::class, 'frigobarstore'])->name('hospedajes_frigobar');
    Route::delete('hospedajes/{hospedaje}/detalle/{detalle}/transporte/{transporte}/destroy', [HospedajeController::class, 'transportesdestroy'])->name('hospedajes_transporte_destroy');
    Route::delete('hospedajes/{hospedaje}', [HospedajeController::class, 'destroy'])->name('hospedajes_destroy');

    //RUTAS CATEGORIAS RESTAURANTES
    Route::get('restaurantecategorias', [RestauranteCategoriaController::class, 'index'])->name('restaurantecategorias_index');
    Route::get('restaurantecategorias/create', [RestauranteCategoriaController::class, 'create'])->name('restaurantecategorias_create');
    Route::post('restaurantecategorias/create', [RestauranteCategoriaController::class, 'store'])->name('restaurantecategorias_create');
    Route::get('restaurantecategorias/{categoria}', [RestauranteCategoriaController::class, 'show'])->name('restaurantecategorias_show');
    Route::get('restaurantecategorias/{categoria}/edit', [RestauranteCategoriaController::class, 'edit'])->name('restaurantecategorias_edit');
    Route::post('restaurantecategorias/{categoria}/edit', [RestauranteCategoriaController::class, 'update'])->name('restaurantecategorias_edit');
    Route::delete('restaurantecategorias/{categoria}', [RestauranteCategoriaController::class, 'destroy'])->name('restaurantecategorias_destroy');
    
    //RUTAS PRODUCTOS RESTAURANTES
    Route::get('restaurantecategorias/{categoria}/productos', [RestauranteProductoController::class, 'index'])->name('productos_index');
    Route::get('restaurantecategorias/{categoria}/productos/create', [RestauranteProductoController::class, 'create'])->name('productos_create');
    Route::post('restaurantecategorias/{categoria}/productos/create', [RestauranteProductoController::class, 'store'])->name('productos_create');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}', [RestauranteProductoController::class, 'show'])->name('productos_show');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/edit', [RestauranteProductoController::class, 'edit'])->name('productos_edit');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/edit', [RestauranteProductoController::class, 'update'])->name('productos_edit');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/fotos', [RestauranteProductoController::class, 'fotos'])->name('productos_galeria');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/fotos', [RestauranteProductoController::class, 'fotosstore'])->name('productos_galeria');
    Route::delete('restaurantecategorias/{categoria}/productos/{producto}/fotos/{galeria}', [RestauranteProductoController::class, 'fotosdelete'])->name('productos_galeria_destroy');
    Route::delete('restaurantecategorias/{categoria}/productos/{producto}', [RestauranteProductoController::class, 'destroy'])->name('productos_destroy');

    //RUTAS PRODUCTOS OPCIONES RESTAURANTES
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/opciones', [OpcionController::class, 'index'])->name('opciones_index');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/opciones/create', [OpcionController::class, 'create'])->name('opciones_create');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/opciones/create', [OpcionController::class, 'store'])->name('opciones_create');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/opciones/{opcion}', [OpcionController::class, 'show'])->name('opciones_show');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/opciones/{opcion}/edit', [OpcionController::class, 'edit'])->name('opciones_edit');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/opciones/{opcion}/edit', [OpcionController::class, 'update'])->name('opciones_edit');
    Route::delete('restaurantecategorias/{categoria}/productos/{producto}/opciones/{opcion}', [OpcionController::class, 'destroy'])->name('opciones_destroy');

    //RUTAS PRODUCTOS TAMAÑOS RESTAURANTES
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos', [TamanoController::class, 'index'])->name('tamanos_index');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/create', [TamanoController::class, 'create'])->name('tamanos_create');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/tamanos/create', [TamanoController::class, 'store'])->name('tamanos_create');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [TamanoController::class, 'show'])->name('tamanos_show');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [TamanoController::class, 'edit'])->name('tamanos_edit');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [TamanoController::class, 'update'])->name('tamanos_edit');
    Route::delete('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [TamanoController::class, 'destroy'])->name('tamanos_destroy');

    //RUTAS RESERVAS RESTAURANTE
    Route::get('restaurantes', [RestauranteController::class, 'index'])->name('restaurantes_index');
    Route::get('restaurantes/create', [RestauranteController::class, 'create'])->name('restaurantes_create');
    Route::post('restaurantes/create', [RestauranteController::class, 'store'])->name('restaurantes_create');
    Route::get('restaurantes/{restaurante}', [RestauranteController::class, 'show'])->name('restaurantes_show');
    Route::get('restaurantes/{restaurante}/reporte', [RestauranteController::class, 'reporte'])->name('restaurantes_reporte');
    Route::get('restaurantes/opciones/{id}', [RestauranteController::class, 'opciones'])->name('restaurantes_opciones');
    Route::get('restaurantes/tamanos/{id}', [RestauranteController::class, 'tamanos'])->name('restaurantes_tamanos');
    Route::delete('restaurantes/{restaurante}', [RestauranteController::class, 'destroy'])->name('restaurantes_destroy');

    //RUTAS CATEGORIAS CAFETERIA
    Route::get('cafeteriacategorias', [CafeteriaCategoriaController::class, 'index'])->name('cafeteriacategorias_index');
    Route::get('cafeteriacategorias/create', [CafeteriaCategoriaController::class, 'create'])->name('cafeteriacategorias_create');
    Route::post('cafeteriacategorias/create', [CafeteriaCategoriaController::class, 'store'])->name('cafeteriacategorias_create');
    Route::get('cafeteriacategorias/{categoria}', [CafeteriaCategoriaController::class, 'show'])->name('cafeteriacategorias_show');
    Route::get('cafeteriacategorias/{categoria}/edit', [CafeteriaCategoriaController::class, 'edit'])->name('cafeteriacategorias_edit');
    Route::post('cafeteriacategorias/{categoria}/edit', [CafeteriaCategoriaController::class, 'update'])->name('cafeteriacategorias_edit');
    Route::delete('cafeteriacategorias/{categoria}', [CafeteriaCategoriaController::class, 'destroy'])->name('cafeteriacategorias_destroy');

    //RUTAS PRODUCTOS CAFETERIA
    Route::get('cafeteriacategorias/{categoria}/productos', [CafeteriaProductoController::class, 'index'])->name('cafeteria_productos_index');
    Route::get('cafeteriacategorias/{categoria}/productos/create', [CafeteriaProductoController::class, 'create'])->name('cafeteria_productos_create');
    Route::post('cafeteriacategorias/{categoria}/productos/create', [CafeteriaProductoController::class, 'store'])->name('cafeteria_productos_create');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}', [CafeteriaProductoController::class, 'show'])->name('cafeteria_productos_show');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/edit', [CafeteriaProductoController::class, 'edit'])->name('cafeteria_productos_edit');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/edit', [CafeteriaProductoController::class, 'update'])->name('cafeteria_productos_edit');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/fotos', [CafeteriaProductoController::class, 'fotos'])->name('cafeteria_productos_galeria');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/fotos', [CafeteriaProductoController::class, 'fotosstore'])->name('cafeteria_productos_galeria');
    Route::delete('cafeteriacategorias/{categoria}/productos/{producto}/fotos/{galeria}', [CafeteriaProductoController::class, 'fotosdelete'])->name('cafeteria_productos_galeria_destroy');
    Route::delete('cafeteriacategorias/{categoria}/productos/{producto}', [CafeteriaProductoController::class, 'destroy'])->name('cafeteria_productos_destroy');

    //RUTAS PRODUCTOS OPCIONES CAFETERIA
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/opciones', [CafeteriaOpcionController::class, 'index'])->name('cafeteria_opciones_index');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/opciones/create', [CafeteriaOpcionController::class, 'create'])->name('cafeteria_opciones_create');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/opciones/create', [CafeteriaOpcionController::class, 'store'])->name('cafeteria_opciones_create');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/opciones/{opcion}', [CafeteriaOpcionController::class, 'show'])->name('cafeteria_opciones_show');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/opciones/{opcion}/edit', [CafeteriaOpcionController::class, 'edit'])->name('cafeteria_opciones_edit');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/opciones/{opcion}/edit', [CafeteriaOpcionController::class, 'update'])->name('cafeteria_opciones_edit');
    Route::delete('cafeteriacategorias/{categoria}/productos/{producto}/opciones/{opcion}', [CafeteriaOpcionController::class, 'destroy'])->name('cafeteria_opciones_destroy');

    //RUTAS PRODUCTOS TAMAÑOS CAFETERIA
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/tamanos', [CafeteriaTamanoController::class, 'index'])->name('cafeteria_tamanos_index');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/create', [CafeteriaTamanoController::class, 'create'])->name('cafeteria_tamanos_create');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/create', [CafeteriaTamanoController::class, 'store'])->name('cafeteria_tamanos_create');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [CafeteriaTamanoController::class, 'show'])->name('cafeteria_tamanos_show');
    Route::get('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [CafeteriaTamanoController::class, 'edit'])->name('cafeteria_tamanos_edit');
    Route::post('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [CafeteriaTamanoController::class, 'update'])->name('cafeteria_tamanos_edit');
    Route::delete('cafeteriacategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [CafeteriaTamanoController::class, 'destroy'])->name('cafeteria_tamanos_destroy');

    //RUTAS RESERVAS CAFETERIA
    Route::get('cafeteria', [CafeteriaController::class, 'index'])->name('cafeteria_index');
    Route::get('cafeteria/create', [CafeteriaController::class, 'create'])->name('cafeteria_create');
    Route::post('cafeteria/create', [CafeteriaController::class, 'store'])->name('cafeteria_create');
    Route::get('cafeteria/{cafeteria}', [CafeteriaController::class, 'show'])->name('cafeteria_show');
    Route::get('cafeteria/{cafeteria}/reporte', [CafeteriaController::class, 'reporte'])->name('cafeteria_reporte');
    Route::get('cafeteria/opciones/{id}', [CafeteriaController::class, 'opciones'])->name('cafeteria_opciones');
    Route::get('cafeteria/tamanos/{id}', [CafeteriaController::class, 'tamanos'])->name('cafeteria_tamanos');
    Route::delete('cafeteria/{cafeteria}', [CafeteriaController::class, 'destroy'])->name('cafeteria_destroy');

    //RUTAS PROMOCIONES
    Route::get('promociones', [PromocionController::class, 'index'])->name('promociones_index');
    Route::get('promociones/create', [PromocionController::class, 'create'])->name('promociones_create');
    Route::post('promociones/create', [PromocionController::class, 'store'])->name('promociones_create');
    Route::get('promociones/{promocion}', [PromocionController::class, 'show'])->name('promociones_show');
    Route::get('promociones/{promocion}/edit', [PromocionController::class, 'edit'])->name('promociones_edit');
    Route::post('promociones/{promocion}/edit', [PromocionController::class, 'update'])->name('promociones_edit');
    Route::delete('promociones/{promocion}', [PromocionController::class, 'destroy'])->name('promociones_destroy');

    //RUTAS PROMOCIONES RESERVAS
    Route::get('promociones/{promocion}/reservas', [PromocionReservaController::class, 'index'])->name('promocionreservas_index');
    Route::get('promociones/{promocion}/reservas/create/{cliente?}', [PromocionReservaController::class, 'create'])->name('promocionreservas_create');
    Route::post('promociones/{promocion}/reservas/create/{cliente?}', [PromocionReservaController::class, 'store'])->name('promocionreservas_create');
    Route::get('promociones/{promocion}/reservas/{reserva}', [PromocionReservaController::class, 'show'])->name('promocionreservas_show');
    Route::post('promociones/acompanante/{id}', [PromocionReservaController::class, 'acompanante'])->name('promocionreservas_acompanante');
    Route::get('promociones/{promocion}/reservas/{reserva}/hospedaje', [PromocionReservaController::class, 'hospedaje'])->name('promocionreservas_hospedaje');
    Route::post('promociones/{promocion}/reservas/{reserva}/hospedaje', [PromocionReservaController::class, 'hospedajestore'])->name('promocionreservas_hospedaje');
    Route::get('promociones/{promocion}/reservas/{reserva}/edit', [PromocionReservaController::class, 'edit'])->name('promocionreservas_edit');
    Route::post('promociones/{promocion}/reservas/{reserva}/edit', [PromocionReservaController::class, 'update'])->name('promocionreservas_edit');
    Route::delete('promociones/{promocion}/reservas/{reserva}', [PromocionReservaController::class, 'destroy'])->name('promocionreservas_destroy');

    //RUTAS LUGARES TURISTICOS
    Route::get('lugaresturisticos', [LugarTuristicoController::class, 'index'])->name('lugaresturisticos_index');
    Route::get('lugaresturisticos/create', [LugarTuristicoController::class, 'create'])->name('lugaresturisticos_create');
    Route::post('lugaresturisticos/create', [LugarTuristicoController::class, 'store'])->name('lugaresturisticos_create');
    Route::get('lugaresturisticos/{lugar}', [LugarTuristicoController::class, 'show'])->name('lugaresturisticos_show');
    Route::get('lugaresturisticos/{lugar}/edit', [LugarTuristicoController::class, 'edit'])->name('lugaresturisticos_edit');
    Route::post('lugaresturisticos/{lugar}/edit', [LugarTuristicoController::class, 'update'])->name('lugaresturisticos_edit');
    Route::get('lugaresturisticos/{lugar}/fotos', [LugarTuristicoController::class, 'fotos'])->name('lugaresturisticos_galeria');
    Route::post('lugaresturisticos/{lugar}/fotos', [LugarTuristicoController::class, 'fotosstore'])->name('lugaresturisticos_galeria');
    Route::delete('lugaresturisticos/{lugar}/fotos/{galeria}', [LugarTuristicoController::class, 'fotosdelete'])->name('lugaresturisticos_galeria_destroy');
    Route::delete('lugaresturisticos/{lugar}', [LugarTuristicoController::class, 'destroy'])->name('lugaresturisticos_destroy');

    //RUTAS RESERVAS LUGARES TURISTICOS
    Route::get('lugaresturisticos/{lugar}/reservas', [LugarTuristicoReservaController::class, 'index'])->name('reservaslugaresturisticos_index');
    Route::get('lugaresturisticos/{lugar}/reservas/create/{cliente?}', [LugarTuristicoReservaController::class, 'create'])->name('reservaslugaresturisticos_create');
    Route::post('lugaresturisticos/{lugar}/reservas/create/{cliente?}', [LugarTuristicoReservaController::class, 'store'])->name('reservaslugaresturisticos_create');
    Route::get('lugaresturisticos/{lugar}/reservas/{reserva}', [LugarTuristicoReservaController::class, 'show'])->name('reservaslugaresturisticos_show');
    Route::get('lugaresturisticos/{lugar}/reservas/{reserva}/hospedaje', [LugarTuristicoReservaController::class, 'hospedaje'])->name('reservaslugaresturisticos_hospedaje');
    Route::get('lugaresturisticos/{lugar}/reservas/{reserva}/edit', [LugarTuristicoReservaController::class, 'edit'])->name('reservaslugaresturisticos_edit');
    Route::post('lugaresturisticos/{lugar}/reservas/{reserva}/edit', [LugarTuristicoReservaController::class, 'update'])->name('reservaslugaresturisticos_edit');
    Route::delete('lugaresturisticos/{lugar}/reservas/{reserva}', [LugarTuristicoReservaController::class, 'destroy'])->name('reservaslugaresturisticos_destroy');

    //RUTAS TRANSPORTES
    Route::get('transportes', [transporteController::class, 'index'])->name('transportes_index');
    Route::get('transportes/create', [transporteController::class, 'create'])->name('transportes_create');
    Route::post('transportes/create', [transporteController::class, 'store'])->name('transportes_create');
    Route::get('transportes/{transporte}', [transporteController::class, 'show'])->name('transportes_show');
    Route::get('transportes/{transporte}/edit', [transporteController::class, 'edit'])->name('transportes_edit');
    Route::post('transportes/{transporte}/edit', [transporteController::class, 'update'])->name('transportes_edit');
    Route::delete('transportes/{transporte}', [transporteController::class, 'destroy'])->name('transportes_destroy');

    //GALERIA HOTEL
    Route::get('hotel/fotos', [HotelController::class, 'fotos'])->name('hotel_galeria');
    Route::post('hotel/fotos', [HotelController::class, 'fotosstore'])->name('hotel_galeria');
    Route::delete('hotel/fotos/{galeria}', [HotelController::class, 'fotosdelete'])->name('hotel_galeria_destroy');

    //RUTAS REPORTE INGRESOS HOSPEDAJES
    Route::get('reportes/hospedaje', [ReporteController::class, 'ingresoshospedajes'])->name('reporte_ingresos_hospedajes');
    Route::post('reportes/hospedaje', [ReporteController::class, 'ingresoshospedajes'])->name('reporte_ingresos_hospedajes');
    Route::get('reportes/hospedaje/{fecha_inicio}/{fecha_fin}', [ReporteController::class, 'reporteingresoshospedajes'])->name('reporte_hospedajes');

    //RUTAS REPORTE INGRESOS RESTAURANTE
    Route::get('reportes/restaurante',[ReporteController::class, 'ingresosrestaurante'])->name('reporte_ingresos_restaurante');
    Route::post('reportes/restaurante',[ReporteController::class, 'ingresosrestaurante'])->name('reporte_ingresos_restaurante');
    Route::get('reportes/restaurante/{fecha_inicio}/{fecha_fin}',[ReporteController::class, 'reporteingresosrestaurante'])->name('reporte_restaurante');

    //RUTAS REPORTE INGRESOS RESTAURANTE
    Route::get('reportes/lugarturistico',[ReporteController::class, 'ingresoslugarturistico'])->name('reporte_ingresos_lugaresturisticos');
    Route::post('reportes/lugarturistico',[ReporteController::class, 'ingresoslugarturistico'])->name('reporte_ingresos_lugaresturisticos');
    Route::get('reportes/lugarturistico/{fecha_inicio}/{fecha_fin}',[ReporteController::class, 'reporteingresoslugarturistico'])->name('reporte_lugaresturisticos');

    //RUTAS REPORTE INGRESOS TRANSPORTES
    Route::get('reportes/transportes',[ReporteController::class, 'ingresostransportes'])->name('reporte_ingresos_transportes');
    Route::post('reportes/transportes',[ReporteController::class, 'ingresostransportes'])->name('reporte_ingresos_transportes');
    Route::get('reportes/transportes/{fecha_inicio}/{fecha_fin}',[ReporteController::class, 'reporteingresostransportes'])->name('reporte_transportes');

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
    Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios_show');
    Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios_edit');
    Route::post('usuarios/{usuario}/edit', [UsuarioController::class, 'update'])->name('usuarios_edit');
    Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios_destroy');

    // AJAX REQUEST 
    Route::get('ajax/reservas-lugares', [HomeController::class, 'ajaxReservasLugares']);
    Route::get('ajax/reservas-restaurante', [HomeController::class, 'ajaxReservasRestaurante']);
    Route::get('ajax/reservas-cafeteria', [HomeController::class, 'ajaxReservasCafeteria']);
    Route::get('ajax/reservas-habitacion', [HomeController::class, 'ajaxReservasHabitacion']);
});


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/{slug?}', [HomeController::class,'index']);
    Route::get('home', [HomeController::class, 'index'])->name('home');
});