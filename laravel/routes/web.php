<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\OpcionController;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\Admin\HabitacionController;
use App\Http\Controllers\Admin\TransporteController;
use App\Http\Controllers\Admin\AcompananteController;
use App\Http\Controllers\Admin\LugarTuristicoController;
use App\Http\Controllers\Admin\HabitacionCategoriaController;
use App\Http\Controllers\Admin\HospedajeController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PromocionReservaController;
use App\Http\Controllers\Admin\ReservaController;
use App\Http\Controllers\Admin\RestauranteProductoController;
use App\Http\Controllers\Admin\RestauranteCategoriaController;
use App\Http\Controllers\Admin\TamanoController;

// Route::group(['middleware' => ['auth','permisos']], function () {
Route::group(['middleware' => ['auth']], function () {

    //RUTAS ACOMPAÑANTES
    Route::get('acompanantes',[AcompananteController::class,'index'])->name('acompanantes_index');
    Route::get('acompanantes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{hospedaje?}', [AcompananteController::class, 'create'])->name('acompanantes_create');
    Route::post('acompanantes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{hospedaje?}', [AcompananteController::class, 'store'])->name('acompanantes_create');
    Route::get('acompanantes/{acompanante}', [AcompananteController::class, 'show'])->name('acompanantes_show');
    Route::get('acompanantes/{acompanante}/edit', [AcompananteController::class, 'edit'])->name('acompanantes_edit');
    Route::post('acompanantes/{acompanante}/edit', [AcompananteController::class, 'update'])->name('acompanantes_edit');
    Route::delete('acompanantes/{acompanante}', [AcompananteController::class, 'destroy'])->name('acompanantes_destroy');

    //RUTAS CLIENTES
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes_index');
    Route::get('clientes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{promocion?}', [ClienteController::class, 'create'])->name('clientes_create');
    Route::post('clientes/create/{tipo?}/{categoria?}/{habitacion?}/{reserva?}/{promocion?}', [ClienteController::class, 'store'])->name('clientes_create');
    Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes_show');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes_edit');
    Route::post('clientes/{cliente}/edit', [ClienteController::class, 'update'])->name('clientes_edit');
    Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes_destroy');

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
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/hospedaje/{acompanante?}', [ReservaController::class, 'hospedaje'])->name('reservas_hospedaje');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/hospedaje/{acompanante?}', [ReservaController::class, 'hospedajestore'])->name('reservas_hospedaje');
    Route::get('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas_edit');
    Route::post('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}/edit', [ReservaController::class, 'update'])->name('reservas_edit');
    Route::delete('habitacioncategorias/{categoria}/habitaciones/{habitacion}/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas_destroy');
    
    //RUTAS HOSPEDAJES
    Route::get('hospedajes', [HospedajeController::class, 'index'])->name('hospedajes_index');
    Route::get('hospedajes/create/{cliente?}/{acompanante?}', [HospedajeController::class, 'create'])->name('hospedajes_create');
    Route::post('hospedajes/create/{cliente?}/{acompanante?}', [HospedajeController::class, 'store'])->name('hospedajes_create');
    Route::get('hospedajes/{hospedaje}/edit/{acompanante?}', [HospedajeController::class, 'edit'])->name('hospedajes_edit');
    Route::post('hospedajes/{hospedaje}/edit/{acompanante?}', [HospedajeController::class, 'update'])->name('hospedajes_edit');
    Route::get('hospedajes/{hospedaje}', [HospedajeController::class, 'show'])->name('hospedajes_show');
    Route::get('hospedajes/{hospedaje}/transporte', [HospedajeController::class, 'transporte'])->name('hospedajes_transporte');
    Route::post('hospedajes/{hospedaje}/transporte', [HospedajeController::class, 'transportestore'])->name('hospedajes_transporte');
    Route::delete('hospedajes/{hospedaje}/detalle/{detalle}/transporte/{transporte}/destroy', [HospedajeController::class, 'transportesdestroy'])->name('hospedajes_transporte_destroy');
    Route::delete('hospedajes/{hospedaje}/detalle/{detalle}/acompanante/{acompanante}/destroy', [HospedajeController::class, 'acompanantedestroy'])->name('hospedajes_acompanante_destroy');
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

    //RUTAS PRODUCTOS OPCIONES RESTAURANTES
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos', [TamanoController::class, 'index'])->name('tamanos_index');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/create', [TamanoController::class, 'create'])->name('tamanos_create');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/tamanos/create', [TamanoController::class, 'store'])->name('tamanos_create');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [TamanoController::class, 'show'])->name('tamanos_show');
    Route::get('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [TamanoController::class, 'edit'])->name('tamanos_edit');
    Route::post('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}/edit', [TamanoController::class, 'update'])->name('tamanos_edit');
    Route::delete('restaurantecategorias/{categoria}/productos/{producto}/tamanos/{tamano}', [TamanoController::class, 'destroy'])->name('tamanos_destroy');

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
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/{slug?}', [HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
