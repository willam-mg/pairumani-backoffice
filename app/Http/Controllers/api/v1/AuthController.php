<?php

namespace App\Http\Controllers\api\v1;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\Socket;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Reserva;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use App\Models\GaleriaHotel;
use App\Models\LugarTuristico;
use App\Events\RecoverPassword;
use App\Models\ReservaCafeteria;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaCategoria;
use App\Models\ReservaRestaurante;
use App\Models\HabitacionCategoria;
use App\Models\RestauranteProducto;
use App\Models\RestauranteCategoria;
use App\Models\ReservaLugarTuristico;
use App\Models\CafeteriaDetalleReserva;
use App\Models\RestauranteDetalleReserva;
use App\Models\HospedajeDetalleTransporte;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\RestauranteDetalleReservaProducto;

class AuthController extends Controller
{
    /**
     * Nuevo cliente.
     * Registro de nuevo Cliente.
     * 
     * @group Authentication
     * @bodyParam nombres string required Los nombes del cliente para el registro. Example: Jose Rodrigo
     * @bodyParam apellidos string required Los apellidos del cliente para el registro. Example: Cespedes Rojas
     * @bodyParam tipo_documento string El tipo de documento que tiene el cliente para el registro . Example: Ci,Pasaporte
     * @bodyParam num_documento string Número de documento del cliente para el registro. Example: 657848455
     * @bodyParam celular string required Número de celular del cliente para el registro. Example: 65582210
     * @bodyParam direccion string Direccón del cliente para el registro. Example: Av Potosi
     * @bodyParam ciudad string La ciudad donde vive el cliente para el registro. Example: La Paz
     * @bodyParam pais string País donde vive el cliente para el registro. Example: Bolivia
     * @bodyParam oficio string El trabajo que realiza el cliente para el registro. Example: Ing Civil
     * @bodyParam empresa string La empresa donde trabaja actualemnte el cliente para el registro. Example: YPFB
     * @bodyParam telefono Número de telefono fijo del cliente para el registro. Example: 4652588
     * @bodyParam email string required Email que usa el cliente para el registro. Example: cliente@gmail.com
     * @bodyParam password string  required La clave que usara para ingresar al sistema el cliente para el registro. Example: cliente54782
     * @bodyParam fecha_nacimiento date Fecha de nacimiento del cliente para el registro. Example: 1985-03-22
     * @bodyParam motivo_viaje string Motivo por el cual viaja el cliente para el registro. Example: Recreacion,Negocios,Salud,Otro
     * @bodyParam foto string Foto que se registrara cuando haga login con sus redes sociales o suba una foto el lciente para el registro. Example: foto.jpg
     * @bodyParam imei_celular string Se registrara el imei del celular del cliente para el registro. Example: 354651100023680
     * @response scenario=success {
     * "id": 7,
     *   "nombres": "Juan Carlos",
     *  "apellidos": "Espinoza Cespedes",
     *   "tipo_documento": "Ci",
     *   "num_documento": "94564455",
     *   "celular": "65582210",
     *   "direccion": "Av Pando",
     *   "ciudad": "Cochabamba",
     *   "pais": "Bolivia",
     *   "oficio": "Arquitecto",
     *   "empresa": "SOFT",
     *   "telefono": "4444444",
     *   "email": "juan@gmail.com",
     *   "fecha_nacimiento": "1989-05-12",
     *   "motivo_viaje": "Recreacion",
     *   "foto": "foto.jpg",
     *   "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
     *   "imei_celular": "354651100023680"
     * }
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'celular' => 'required|numeric|digits:8|unique:clientes',
            'email' => 'required|email|unique:clientes',
            'password' => 'required|string|min:6',
            'tipo_documento' => '',
            'num_documento' => '',
            'direccion' => '',
            'ciudad' => '',
            'pais' => '',
            'oficio' => '',
            'empresa' => '',
            'fecha_nacimiento' => '',
            'motivo_viaje' => '',
            'telefono' => 'numeric|digits:8|unique:clientes',
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }

        $cliente = new Cliente();
        $cliente->nombres = $request->post('nombres');
        $cliente->apellidos = $request->post('apellidos');
        $cliente->tipo_documento = $request->post('tipo_documento');
        $cliente->num_documento = $request->post('num_documento');
        $cliente->celular = $request->post('celular');
        $cliente->direccion = $request->post('direccion');
        $cliente->ciudad = $request->post('ciudad');
        $cliente->pais = $request->post('pais');
        $cliente->oficio = $request->post('oficio');
        $cliente->empresa = $request->post('empresa');
        $cliente->telefono = $request->post('telefono');
        $cliente->email = $request->post('email');
        $cliente->password = Hash::make($request->post('password'));
        $cliente->fecha_nacimiento = $request->post('fecha_nacimiento');
        $cliente->motivo_viaje = $request->post('motivo_viaje');
        $cliente->foto = $request->post('foto');
        $cliente->api_token = str::random('60');
        $cliente->imei_celular = $request->post('imei_celular');
        $cliente->save();
        return response()->json(['success' => 'true', 'data' => $cliente], 200);
    }

    /**
     * Login.
     * Login con redes sociales y normal 
     * 1 = Email, 2 = gmail,3 = facebook.
     * 
     * @group Authentication
     * @bodyParam tipo_login integer required Type login Ejm: 1 = Email, 2 = gmail,3 = facebook
     * @bodyParam nombres string required 
     * @bodyParam email string required
     * @bodyParam celular string insted of email
     * @bodyParam password string required only tipo_login = 1
     * @bodyParam foto string only tipo_login = 2 or 3
     * @bodyParam imei_celular string 
     * @bodyParam apellidos string
     * 
     * @response scenario=success {
     * "id": 7,
     *   "nombres": "Juan Carlos",
     *  "apellidos": "Espinoza Cespedes",
     *   "tipo_documento": "Ci",
     *   "num_documento": "94564455",
     *   "celular": "65582210",
     *   "direccion": "Av Pando",
     *   "ciudad": "Cochabamba",
     *   "pais": "Bolivia",
     *   "oficio": "Arquitecto",
     *   "empresa": "SOFT",
     *   "telefono": "4444444",
     *   "email": "juan@gmail.com",
     *   "fecha_nacimiento": "1989-05-12",
     *   "motivo_viaje": "Recreacion",
     *   "foto": "foto.jpg",
     *   "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
     *   "imei_celular": "354651100023680"
     * }
     */
    public function login(Request $request)
    {
        if ($request->post('password') && $request->post('tipo_login') == Cliente::TIPO) {
            if (Auth::guard('cliente')->attempt(['email' => $request->email, 'password' => $request->password])) {
                $cliente = Auth::guard('cliente')->user();
                if ($cliente->foto == "" || !$cliente->foto) {
                    $cliente->foto = $request->post('foto');
                }
                $cliente->imei_celular = $request->post('imei_celular');
                $cliente->save();
                return response()->json(['success' => 'true', 'data' => $cliente], 200);
            } else {
                return response()->json(['success' => 'false', 'data' => 'El usuario no es valido'], 402);
            }
        }
        // login con gmail
        if ($request->post('tipo_login') == Cliente::TIPOGMAIL) {

            $cliente = Cliente::where('email', $request->post('email'))->first();
            if (!$cliente) {
                $cliente = Cliente::where('email', $request->post('celular').'@pairumanicelular.com')->first();
            }
            if (!empty($cliente)) {
                if ($cliente->foto == "" || !$cliente->foto) {
                    $cliente->foto = $request->post('foto');
                }
                $cliente->save();
                return response()->json(['success' => 'true', 'data' => $cliente], 200);
            } else {
                try {
                    DB::beginTransaction();
                    $cliente = new Cliente();
                    $cliente->nombres = $request->post('nombres');
                    $cliente->apellidos = $request->post('apellidos') ?: null;
                    $cliente->tipo_documento = $request->post('tipo_documento') ?: null;
                    $cliente->num_documento = $request->post('num_documento') ?: null;
                    $cliente->celular = $request->post('celular') ?: null;
                    $cliente->direccion = $request->post('direccion') ?: null;
                    $cliente->ciudad = $request->post('ciudad') ?: null;
                    $cliente->pais = $request->post('pais') ?: null;
                    $cliente->oficio = $request->post('oficio') ?: null;
                    $cliente->empresa = $request->post('empresa') ?: null;
                    $cliente->telefono = $request->post('telefono') ?: null;
                    $cliente->email = $request->post('email') ?: $request->post('celular').'@pairumanicelular.com';
                    $cliente->password = Hash::make($cliente->email) ?: null;
                    $cliente->fecha_nacimiento = $request->post('fecha_nacimiento') ?: null;
                    $cliente->motivo_viaje = $request->post('motivo_viaje') ?: null;
                    $cliente->foto = $request->post('foto') ?: null;
                    $cliente->api_token = str::random('60') ?: null;
                    $cliente->imei_celular = $request->post('imei_celular') ?: null;
                    $cliente->save();
                    DB::commit();
                    return response()->json(['success' => 'true', 'data' => $cliente], 200);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['success' => 'false', 'data' => $e->getMessage()], 422);
                }
            }
        }
        // login con facebook
        if ( $request->post('tipo_login') == Cliente::TIPOFACE) {
            $cliente = Cliente::where('email', $request->post('email'))->first();
            if (!empty($cliente)) {
                if ($cliente->foto != "" || !$cliente->foto) {
                    $cliente->foto = $request->post('foto');
                }
                $cliente->save();
                return response()->json(['success' => 'true', 'data' => $cliente], 200);
            } else {
                try {
                    DB::beginTransaction();
                    $cliente = new Cliente();
                    $cliente->nombres = $request->post('nombres');
                    $cliente->apellidos = $request->post('apellidos') ?: null;
                    $cliente->tipo_documento = $request->post('tipo_documento') ?: null;
                    $cliente->num_documento = $request->post('num_documento') ?: null;
                    $cliente->celular = $request->post('celular') ?: null;
                    $cliente->direccion = $request->post('direccion') ?: null;
                    $cliente->ciudad = $request->post('ciudad') ?: null;
                    $cliente->pais = $request->post('pais') ?: null;
                    $cliente->oficio = $request->post('oficio') ?: null;
                    $cliente->empresa = $request->post('empresa') ?: null;
                    $cliente->telefono = $request->post('telefono') ?: null;
                    $cliente->email = $request->post('email') ?: $request->post('celular') . '@pairumanicelular.com';
                    $cliente->password = Hash::make($cliente->email) ?: null;
                    $cliente->fecha_nacimiento = $request->post('fecha_nacimiento') ?: null;
                    $cliente->motivo_viaje = $request->post('motivo_viaje') ?: null;
                    $cliente->foto = $request->post('foto') ?: null;
                    $cliente->api_token = str::random('60');
                    $cliente->imei_celular = $request->post('imei_celular') ?: null;
                    $cliente->save();
                    DB::commit();
                    return response()->json(['success' => 'true', 'data' => $cliente], 200);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['success' => 'false', 'data' => $e->getMessage()], 422);
                }
            }
        }
    }

    /**
     * Envia un codigo.
     * Envia un codigo al email del cliente.
     * 
     * @group Authentication
     * @bodyParam email string required Verificacion que existe el email enviado. Example: cliente@gmail.com
     * @response scenario=success {
     * "id": 7,
     *   "nombres": "Juan Carlos",
     *  "apellidos": "Espinoza Cespedes",
     *   "tipo_documento": "Ci",
     *   "num_documento": "94564455",
     *   "celular": "65582210",
     *   "direccion": "Av Pando",
     *   "ciudad": "Cochabamba",
     *   "pais": "Bolivia",
     *   "oficio": "Arquitecto",
     *   "empresa": "SOFT",
     *   "telefono": "4444444",
     *   "email": "juan@gmail.com",
     *   "fecha_nacimiento": "1989-05-12",
     *   "motivo_viaje": "Recreacion",
     *   "foto": "foto.jpg",
     *   "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
     *   "imei_celular": "354651100023680"
     * }
     */
    public function sendCode(Request $request)
    {
        try {
            $cliente = Cliente::where('email', $request->post('email'))->first();
            if (!$cliente) {
                throw new \Exception('Lo sentimos el email no existe');
            }

            ///generamos un código random de 8 caracteres
            $code = rand(10000000, 99999999);
            //envaimos por email al cliente el codigo generado
            RecoverPassword::dispatch($cliente, $code);

            //guardamos en una variable de sesion el codigo
            session(['code' => $code]);

            return response()->json([
                'success' => 'true',
                'data' => $cliente,
                'code' => $code
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => 'false',
                'data' => $th->getMessage()
            ], 409);
        }
    }

    /**
     * Verificacion de codigo. 
     * Verificacion de codigo enviado al email del cliente.
     * 
     * @group Authentication
     * @bodyParam codigo string required Verificacion que el codigo que se envio a su email coincidan. Example: 58741258
     * @bodyParam cliente_id int required Id del cliente para devolver su informacion. Example: 5
     * @response scenario=success {
     * "id": 7,
     *   "nombres": "Juan Carlos",
     *  "apellidos": "Espinoza Cespedes",
     *   "tipo_documento": "Ci",
     *   "num_documento": "94564455",
     *   "celular": "65582210",
     *   "direccion": "Av Pando",
     *   "ciudad": "Cochabamba",
     *   "pais": "Bolivia",
     *   "oficio": "Arquitecto",
     *   "empresa": "SOFT",
     *   "telefono": "4444444",
     *   "email": "juan@gmail.com",
     *   "fecha_nacimiento": "1989-05-12",
     *   "motivo_viaje": "Recreacion",
     *   "foto": "foto.jpg",
     *   "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
     *   "imei_celular": "354651100023680"
     * }
     */
    public function validateCode(Request $request)
    {
        //recuperar la variable de sesion code
        $code = session('code');

        //verificar que los codigos sean iguales
        if ($request->post('codigo') == $code) {
            $respuesta = Cliente::where('id', $request->post('cliente_id'))->first();
            //destruir la variable se sesion
            session()->forget('code');
            return response()->json(['success' => 'true', 'data' => $respuesta], 200);
        } else {
            $respuesta = 'Código invalido';
            return response()->json(['success' => 'false', 'data' => $respuesta], 200);
        }

    }

    /**
     * Cambio de password.
     * 
     * @group Authentication
     * @bodyParam id int required Id del cliente a restablecer la contraseña. Example: 5
     * @bodyParam password string required Password por el cual restablecera. Example: cliente12578
     * @bodyParam retypepassword string required Verificacion de que escribio bien la contraseña. Example: cliente12578
     * @response scenario=success {
     *   "data": Se cambio la contraseña,
     * }
     */
    public function cambiarpassword(Request $request)
    {
        // $cliente = Cliente::where('id', $request->post('cliente_id'))->first();
        $cliente = Cliente::findOrFail($request->post('id'));
        $password = $request->post('password');
        $retypepassword = $request->post('retypepassword');

        if ($password != $retypepassword) {
            return response()->json(['success' => 'false', 'data' => 'Las contraseñas no coinciden'], 422);
        }

        $cliente->password = Hash::make($password);
        $cliente->save();

        return response()->json(['success' => 'true', 'data' => $cliente], 200);
    }
}