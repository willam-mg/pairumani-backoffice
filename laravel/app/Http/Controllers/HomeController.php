<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use App\Models\Acompanante;
use App\Models\LugarTuristico;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaCategoria;
use App\Models\HabitacionCategoria;
use App\Models\RestauranteProducto;
use App\Models\RestauranteCategoria;
use App\Models\ReservaLugarTuristico;
use App\Models\ReservaRestaurante;
use App\Models\ReservaCafeteria;
use App\Models\Reserva;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'usuarios' => User::all(),
            'roles' => Rol::all(),
            'habitacioncategorias' => HabitacionCategoria::all(),
            'habitaciones' => Habitacion::all(),
            'restaurantecategorias' => RestauranteCategoria::all(),
            'restauranteproductos' => RestauranteProducto::all(),
            'cafeteriacategorias' => CafeteriaCategoria::all(),
            'cafeteriaproductos' => CafeteriaProducto::all(),
            'lugaresturisticos' => LugarTuristico::all(),
            'transportes' => Transporte::all(),
            'eventos' => Evento::all(),
            'clientes' => Cliente::all(),
            'acompañantes' => Acompanante::all(),
            'promociones' => Promocion::all(),
        ]);
    }

    /**
     * reservas de lugares turisticos.
     * retorna las 5 ultimas reservas de lugares turisticos.
     * @return Html
     */
    public function ajaxReservasLugares() {
        $reservas =  ReservaLugarTuristico::orderBy('.id', 'desc')->paginate(5);
        return view('home/_reservas_lugares', ['datos'=>$reservas]);
    }
    
    /**
     * reservas de retaurante.
     * retorna las 5 ultimas reservas de restaurante.
     * @return Html
     */
    public function ajaxReservasRestaurante() {
        $reservas =  ReservaRestaurante::orderBy('.id', 'desc')->paginate(5);
        return view('home/_reservas_restaurante', ['datos'=>$reservas]);
    }
    
    /**
     * reservas de cafeteria.
     * retorna las 5 ultimas reservas de cafeteria.
     * @return Html
     */
    public function ajaxReservasCafeteria() {
        $reservas =  ReservaCafeteria::orderBy('.id', 'desc')->paginate(5);
        return view('home/_reservas_cafeteria', ['datos'=>$reservas]);
    }
    
    /**
     * reservas de habitaciones.
     * retorna las 5 ultimas reservas de habitaciones.
     * @return Html
     */
    public function ajaxReservasHabitacion() {
        $reservas =  Reserva::orderBy('.id', 'desc')->paginate(5);
        return view('home/_reservas_habitacion', ['datos'=>$reservas]);
    }
}
