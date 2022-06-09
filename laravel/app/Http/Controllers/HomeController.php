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
        $limitPage = 5;
        $reservasLugaresTuristicos = ReservaLugarTuristico::orderBy('.id', 'desc')->paginate($limitPage);
        $reservasRestaurante = ReservaRestaurante::orderBy('.id', 'desc')->paginate($limitPage);
        $reservasCafeteria = ReservaCafeteria::orderBy('.id', 'desc')->paginate($limitPage);
        $reservasHabitaciones = Reserva::orderBy('.id', 'desc')->paginate($limitPage);
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
            'reservasLugaresTuristicos' => $reservasLugaresTuristicos,
            'reservasRestaurante' => $reservasRestaurante,
            'reservasCafeteria' => $reservasCafeteria,
            'reservasHabitaciones' => $reservasHabitaciones,
        ]);
    }
}
