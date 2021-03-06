<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use Illuminate\Support\Str;
use App\Models\GaleriaHotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LugarTuristico;
use App\Events\RecoverPassword;
use App\Models\ReservaCafeteria;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaCategoria;
use App\Models\ReservaRestaurante;
use Illuminate\Support\Facades\DB;
use App\Models\HabitacionCategoria;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\RestauranteCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ReservaLugarTuristico;
use App\Models\CafeteriaDetalleReserva;
use App\Models\RestauranteDetalleReserva;
use Illuminate\Support\Facades\Validator;
use App\Models\HospedajeDetalleTransporte;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\RestauranteDetalleReservaProducto;
use App\View\Components\Socket;

class ClienteController extends Controller
{
    /**
     * Login con redes sociales y normal
     * 
     * @bodyParam tipo_login string required El tipo de login que usara el cliente para iniciar sesion. Example: 1,2,3
     * @bodyParam email string required El email que usara el cliente para iniciar sesion. Example: cliente@gmail.com
     * @bodyParam password string required El password que usara el cliente para iniciar sesion y registro. Example: cliente1568
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
     * @bodyParam email string Email que usa el cliente para el registro. Example: cliente@gmail.com
     * @bodyParam password string La clave que usara para ingresar al sistema el cliente para el registro. Example: cliente54782
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
        if ($request->post('email') && $request->post('tipo_login') == Cliente::TIPOGMAIL) {

            $cliente = Cliente::where('email', $request->post('email'))->first();
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
                    DB::commit();
                        return response()->json(['success' => 'true', 'data' => $cliente], 200);
                } catch (\Exception $e) {
                    DB::rollback();
                        return response()->json(['success' => 'false', 'data' => $e->getMessage()], 422);
                }
            }
        }
        // login con facebook
        if ($request->post('email') && $request->post('tipo_login') == Cliente::TIPOFACE) {
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
     * Registro de nuevo Cliente
     * 
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
     * @bodyParam email string Email que usa el cliente para el registro. Example: cliente@gmail.com
     * @bodyParam password string La clave que usara para ingresar al sistema el cliente para el registro. Example: cliente54782
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'celular' => 'numeric|digits:8|unique:clientes',
            'email' => 'required|unique:clientes',
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
     * Perfil de Cliente
     * 
     * @bodyParam cliente_id int required Id del cliente para mostrar el detalle de su perfil. Example: 7
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
    public function perfil(Request $request)
    {
        $cliente = Cliente::where('id', $request->post('cliente_id'))->first();

        $detalles = [];
        array_push($detalles, [
            'id' => $cliente->id,
            'nombres' => $cliente->nombres,
            'apellidos' => $cliente->apellidos,
            'tipo_documento' => $cliente->tipo_documento,
            'num_documento' => $cliente->num_documento,
            'celular' => $cliente->celular,
            'direccion' => $cliente->direccion,
            'ciudad' => $cliente->ciudad,
            'pais' => $cliente->pais,
            'oficio' => $cliente->oficio,
            'empresa' => $cliente->empresa,
            'telefono' => $cliente->telefono,
            'email' => $cliente->email,
            'fecha_nacimiento' => $cliente->fecha_nacimiento,
            'motivo_viaje' => $cliente->motivo_viaje,
            'foto' => $cliente->fotourl,
            'api_token' => $cliente->api_token,
            'imei_celular' => $cliente->imei_celular,
        ]);

        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Editar perfil Cliente
     * 
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
     * @bodyParam email string Email que usa el cliente para el registro. Example: cliente@gmail.com
     * @bodyParam password string La clave que usara para ingresar al sistema el cliente para el registro. Example: cliente54782
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
    public function update(Request $request)
    {
        $cliente = Cliente::where('id', $request->post('cliente_id'))->first();
        $auxfoto = $cliente->foto;
        if ($request->post() && $cliente) {
            try {
                DB::beginTransaction();
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
                    if ($request->post('foto')) {
                        //eliminando foto existente
                        eliminarimagen($cliente->foto, Cliente::Ruta(), Cliente::Urldelete());

                        $cliente->foto = Cliente::Name() . '.png';

                        if (!base64_to_jpeg($request->post('foto'), $cliente->foto, Cliente::Ruta())) {
                            throw new \Exception('La foto tuvo inconveniente al guardarse');
                        }
                    } else {
                        $cliente->foto = $auxfoto;
                    }
                    $cliente->save();

                DB::commit();
                return response()->json(['success' => 'true', 'data' => 'Cliente editado'], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success' => 'false', 'data' => $e->getMessage()], 422);
                // return var_dump($e->getMessage());
                // return var_dump($e );
            }
        }
        return response()->json(['success' => 'false', 'data' => 'El cliente no existe'], 400);
    }
    /**
     * Verificacion de email para cambio de password
     * 
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
    public function verificaremail(Request $request)
    {
        //verificar que existe el emial enviado
        $cliente = Cliente::where('email',$request->post('email'))->first();
        if(!$cliente){
            return response()->json(['success' => 'false', 'data' => 'Lo sentimos el email no existe'], 409);
        }
        ///generamos un código random de 8 caracteres
        $code = rand(10000000, 99999999);

        //envaimos por email al cliente el codigo generado
        RecoverPassword::dispatch($cliente,$code);

        //guardamos en una variable de sesion el codigo
        session(['code' => $code]);

        return response()->json(['success' => 'true', 'data' => $cliente,'code' =>$code], 200);
    }
    /**
     * Verificacion de codigo enviado al email del cliente
     * 
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
    public function verificarcodigo(Request $request)
    {
        //recuperar la variable de sesion code
        $code = session('code');
        
        //verificar que los codigos sean iguales
        if($request->post('codigo') == $code){
            $respuesta = Cliente::where('id',$request->post('cliente_id'))->first();
            //destruir la variable se sesion
            session()->forget('code');
        }else{
            $respuesta = 'Código incorrecto, intente nuevamente';
        }

        return response()->json(['success' => 'true', 'data' => $respuesta], 200);
    }
    /**
     * Cambio de password del Cliente
     * 
     * @bodyParam id int required Id del cliente a restablecer la contraseña. Example: 5
     * @bodyParam password string required Password por el cual restablecera. Example: cliente12578
     * @bodyParam retypepassword string required Verificacion de que escribio bien la contraseña. Example: cliente12578
     * @response scenario=success {
     *   "data": Se cambio la contraseña,
     * }
     */
    public function cambiarpassword(Request $request)
    {
        $cliente = Cliente::where('id',$request->post('cliente_id'))->first();
        $password = $request->post('password');
        $retypepassword = $request->post('retypepassword');

        if ($password != $retypepassword) {
            return response()->json(['success' => 'false', 'data' => 'Las contraseñas no coinciden'], 422);
        }

        $cliente->password = Hash::make($password);
        $cliente->save();

        return response()->json(['success' => 'true', 'data' => $cliente], 200);
    }
    /**
     * Listado de la Galeria del Hotel
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *   "id": 1,
     *   "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/hotel/galeria/foto_210514173512.jpg",
     *   "descripcion": "<p>sadsafasfa</p>"
     * }
     */
    public function sliders()
    {
        $sliders = GaleriaHotel::all();
        $detalles = [];
        foreach($sliders as $slider){
            array_push($detalles,[
                'id' => $slider->id,
                'foto' => $slider->fotourl,
                'descripcion' => $slider->descripcion,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de las categorias de las habitaciones
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *   "id": 4,
     *   "nombre": "Habitacion Presidencial",
     *   "descripcion": "<p>sadsafasfa</p>",
     *   "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/categorias/habitacioncategoria_210422124342.jpg"
     * }
     */
    public function habitacioncategorias()
    {
        $categorias = HabitacionCategoria::all();
        $detalles = [];
        foreach ($categorias as $categoria) {
            array_push($detalles, [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion,
                'foto' => $categoria->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de habitaciones segun la categoria que estan enlazadas
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam categoria_id int required Id de la categoria de la habitacion. Example: 1
     * @response scenario=success {
     *       "nombre": "Habitacion 1",
     *       "descripcion": "<p>asdafasfasfasfafafas</p>",
     *       "num_habitacion": 1,
     *       "precio": "850.00",
     *       "precio_promocion": "550.00",
     *       "capacidad_minima": "3",
     *       "capacidad_maxima": "7",
     *       "estado": "Disponible",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/habitacion_210516222401.jfif"
     * }
     */
    public function Habitaciones(Request $request)
    {
        $habitaciones = Habitacion::where('habitacion_categoria_id',$request->post('categoria_id'))->where('estado','Disponible')->get();
        $detalles = [];
        foreach ($habitaciones as $habitacion) {
            array_push($detalles, [
                'id' => $habitacion->id,
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'capacidad_minima' => $habitacion->capacidad_minima,
                'capacidad_maxima' => $habitacion->capacidad_maxima,
                'estado' => $habitacion->estado,
                'categoria' => $habitacion->categoria->nombre,
                'foto' => $habitacion->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Detalle de la habitacion
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam habitacion_id int required Id de la habitacion para ver su detalle. Example: 1
     * @response scenario=success {
     *       "nombre": "asfasfasgfsagasga",
     *       "descripcion": "<p>asasfasfa</p>",
     *       "num_habitacion": 100,
     *       "precio": "250.00",
     *       "precio_promocion": "0.00",
     *       "capacidad_minima": "6",
     *       "capacidad_maxima": "8",
     *       "estado": "Reservado",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/habitacion_210430121313.jpg"
     * }
     */
    public function habitaciondetalle(Request $request)
    {
        $habitacion = Habitacion::where('id',$request->post('habitacion_id'))->first();
        $detalles = [];
        array_push($detalles,[
            'id' => $habitacion->id,
            'nombre' => $habitacion->nombre,
            'descripcion' => $habitacion->descripcion,
            'num_habitacion' => $habitacion->num_habitacion,
            'precio' => $habitacion->precio,
            'capacidad_minima' => $habitacion->capacidad_minima,
            'capacidad_maxima' => $habitacion->capacidad_maxima,
            'estado' => $habitacion->estado,
            'foto' => $habitacion->fotourl,
            'galeria' => $habitacion->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }), 
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de habitaciones a la categoria que pertenece
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "Habitacion 1",
     *       "descripcion": "<p>asdafasfasfasfafafas</p>",
     *       "num_habitacion": 1,
     *       "precio": "850.00",
     *       "precio_promocion": "550.00",
     *       "capacidad_minima": "3",
     *       "capacidad_maxima": "7",
     *       "estado": "Disponible",
     *       "categoria": "Habitacion Presidencial",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/habitacion_210516222401.jfif"
     * }
     */
    public function habitacionescategoria()
    {
        $habitaciones = Habitacion::where('estado','Disponible')->limit(10)->inRandomOrder()->get();
        $detalles = [];
        foreach ($habitaciones as $habitacion) {
            array_push($detalles, [
                'id' => $habitacion->id,
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'capacidad_minima' => $habitacion->capacidad_minima,
                'capacidad_maxima' => $habitacion->capacidad_maxima,
                'estado' => $habitacion->estado,
                'categoria' => $habitacion->categoria->nombre,
                'id_categoria' => $habitacion->categoria->id,
                'foto' => $habitacion->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de promociones de las habitaciones
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "asdasfasfasfa",
     *       "descripcion": "<p>asfasfasfasfsafa</p>",
     *       "precio": "150.00",
     *       "estado": "Activo",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/promociones/promocion_210513161554.jpg"
     * }
     */
    public function promociones()
    {
        $promociones = Promocion::where('estado','Activo')->inRandomOrder()->limit(10)->get();
        $detalles = [];
        foreach ($promociones as $promocion) {
            array_push($detalles, [
                'id' => $promocion->id,
                'nombre' => $promocion->nombre,
                'descripcion' => $promocion->descripcion,
                'precio' => $promocion->precio,
                'estado' => $promocion->estado,
                'foto' => $promocion->fotourl,
                'habitacion_id' => $promocion->habitacion_id,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de transportes
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "Taxis corona",
     *       "descripcion": "<p>adasdasdasd</p>",
     *       "precio": "25.00"
     * }
     */
    public function transportes()
    {
        $transportes = Transporte::all();
        $detalles = [];
        foreach ($transportes as $transporte) {
            array_push($detalles, [
                'id' => $transporte->id,
                'nombre' => $transporte->nombre,
                'descripcion' => $transporte->descripcion,
                'precio' => $transporte->precio,
                'foto' => $transporte->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Detalle de transporte
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam transporte_id int required Id del transporte para ver su detalle. Example: 1
     * @response scenario=success {
     *       "nombre": "Taxis corona",
     *       "descripcion": "<p>adasdasdasd</p>",
     *       "precio": "25.00",
     *       "foto": "foto.jpg"
     * }
     */
    public function transportedetalle(Request $request)
    {
        $transporte = Transporte::where('id',$request->post('transporte_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $transporte->id,
            'nombre' => $transporte->nombre,
            'descripcion' => $transporte->descripcion,
            'precio' => $transporte->precio,
            'foto' => $transporte->fotourl,
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de eventos
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "sadaasfasa",
     *       "descripcion": "<p>asfasfasfas</p>",
     *       "fecha": "2021-04-24",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/eventos/evento_210422123859.jpg"
     * }
     */
    public function eventos()
    {
        $eventos = Evento::all();
        $detalles = [];
        foreach ($eventos as $evento) {
            array_push($detalles, [
                'id' => $evento->id,
                'nombre' => $evento->nombre,
                'descripcion' => $evento->descripcion,
                'fecha' => Carbon::parse(strtotime($evento->fecha))->formatLocalized('%d de %B del %Y'),
                'foto' => $evento->fotourl,
'galeria' => $evento->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de Lugares Turisticos Gastronomicos
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "Pairumani",
     *       "descripcion": "<p>Recorrido por todo el parque</p>",
     *       "precio_recorrido": "500.00",
     *       "lat": "-17.38918918180772",
     *       "lng": "-66.15840481762962",
     *       "tipo": "Gastronomia",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     * }
     */
    public function lugaresgastronomia()
    {
        $lugares = LugarTuristico::where('tipo','Gastronomia')->get();
        $detalles = [];
        foreach ($lugares as $lugar) {
            array_push($detalles, [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'precio_recorrido' => $lugar->precio_recorrido,
                'lat' => $lugar->lat,
                'lng' => $lugar->lng,
                'tipo' => $lugar->tipo,
                'foto' => $lugar->fotourl,
                'galeria' => $lugar->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de Lugares Turisticos Turismo
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "Pairumani",
     *       "descripcion": "<p>Recorrido por todo el parque</p>",
     *       "precio_recorrido": "500.00",
     *       "lat": "-17.38918918180772",
     *       "lng": "-66.15840481762962",
     *       "tipo": "Turismo",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     * }
     */
    public function lugaresturismo()
    {
        $lugares = LugarTuristico::where('tipo', 'Turismo')->get();
        $detalles = [];
        foreach ($lugares as $lugar) {
            array_push($detalles, [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'precio_recorrido' => $lugar->precio_recorrido,
                'lat' => $lugar->lat,
                'lng' => $lugar->lng,
                'tipo' => $lugar->tipo,
                'foto' => $lugar->fotourl,
                'galeria' => $lugar->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Detalle Lugar Turistico
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam turismo_id int Id del lugar turistico. Example: 2
     * @response scenario=success {
     *       "nombre": "Plaza Principal",
     *       "descripcion": "<p>asdafafafmans,mfna,s</p>",
     *       "precio_recorrido": "250.00",
     *       "lat": "-17.39375549279761",
     *       "lng": "-66.15695642476157",
     *       "tipo": "Turismo",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210513145930.jpg"
     * }
     */
    public function turismodetalle(Request $request)
    {
        $lugar = LugarTuristico::where('id',$request->post('turismo_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'nombre' => $lugar->nombre,
            'descripcion' => $lugar->descripcion,
            'precio_recorrido' => $lugar->precio_recorrido,
            'lat' => $lugar->lat,
            'lng' => $lugar->lng,
            'tipo' => $lugar->tipo,
            'foto' => $lugar->fotourl,
            'galeria' => $lugar->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de Categorias Restaurante
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "adasdasfasf",
     *       "descripcion": "<p>safasfasfasfa</p>",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/restaurantes/categorias/restaurantecategoria_210422153310.jpg"
     * }
     */
    public function restaurantecategorias()
    {
        $categorias = RestauranteCategoria::all();
        $detalles = [];
        foreach ($categorias as $categoria) {
            array_push($detalles, [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion,
                'foto' => $categoria->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de Productos Restaurante segun a la Categoria que pertenecen
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam categoria_id int required Id de la categoria del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/restaurantes/productos/producto_210423115837.jpg"
     * }
     */
    public function restauranteproductos(Request $request)
    {
        $productos = RestauranteProducto::where('restaurante_categoria_id',$request->post('categoria_id'))->get();
        $detalles = [];
        foreach ($productos as $producto) {
            array_push($detalles, [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'foto' => $producto->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Deatelle Producto Restaurante
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam producto_id int required Id del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/restaurantes/productos/producto_210423115837.jpg"
     * }
     */
    public function productodetalle(Request $request)
    {
        $producto = RestauranteProducto::where('id',$request->post('producto_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'foto' => $producto->fotourl,
            'galeria' => $producto->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
            'opciones' => $producto->opciones->map(function ($opcion) {
               return [
                  'id' => $opcion->id,
                  'nombre' => $opcion->nombre,
              ];
            
            }),
            'tamanos' => $producto->tamanos->map(function ($tamano) {
                return [
                    'id' => $tamano->id,
                    'nombre' => $tamano->nombre,
                    'precio' => $tamano->precio,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Creacion de la Reserva de una Habitacion
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam checkin date required Fecha checkin. Example: 2021-05-17
     * @bodyParam checkout date required Fecha checkout. Example: 2021-05-19
     * @bodyParam adultos int required Canridad de adultos en la habitacion. Example: 3
     * @bodyParam ninos int required Cantidad de niños en la habitacion. Example: 2
     * @bodyParam cliente_id int required Id del cliente a reservar. Example: 1
     * @bodyParam habitacion_id int required Id de la habitacion. Example: 1
     * @response scenario=success {
     *       "checkin": "2021-05-14",
     *       "checkout": "2021-05-16",
     *       "adultos": "3",
     *       "niños": "2",
     *       "cliente_id": 7,
     *       "habitacion_id": 8,
     *       "id": 8
     * }
     */
    public function reservahabitacion(Request $request)
    {
        $habitacion = Habitacion::where('id',$request->post('habitacion_id'))->first();
        if($habitacion->estado == 'Reservado'){
            return response()->json(['success' => 'false', 'data' => 'La habitacion ya fue reservada'], 409);
        }
        //creacion de la reserva
        $reserva = new Reserva();
        $reserva->checkin = $request->post('checkin');
        $reserva->checkout = $request->post('checkout');
        $reserva->adultos = $request->post('adultos');
        $reserva->niños = $request->post('ninos');
        $reserva->cliente_id = $request->post('cliente_id');
        $reserva->habitacion_id = $request->post('habitacion_id');
        $reserva->save();

        //cambio de estado de la habitacion
        $habitacion->estado = 'Reservado';
        $habitacion->save();
        Socket::emmit();
        return response()->json(['success' => 'true', 'data' => $reserva], 200);
    }
    /**
     * Reservas Cliente
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam cliente_id int required Id del cliente. Example: 1
     * @response scenario=success {
     *       "id": 5,
     *      "checkin": "2021-05-06",
     *       "checkout": "2021-05-08",
     *      "adultos": 3,
     *       "niños": 2,
     *       "cliente": {
     *           "nombre": "Paola Montecinos Pardo",
     *           "celular": "8888888",
     *           "telefono": "9999999",
     *           "ciudad": "Cochabamba",
     *           "pais": "Bolivia",
     *           "oficio": "Arquitecto",
     *           "email": "paola@gmail.com"
     *       },
     *       "habitacion": {
     *           "nombre": "Habitacion 20",
     *           "num_habitacion": "20",
     *           "precio": "450.00",
     *           "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/habitacion_210506153104.jfif"
     *       }
     * }
     */
    public function misreservas(Request $request)
    {
        $reservas = Reserva::where('cliente_id',$request->post('cliente_id'))->where('estado', '=','Reservado')->get();
        $detalles = [];
        foreach ($reservas as $reserva) {
            array_push($detalles, [
                'id' => $reserva->id,
                'checkin' => $reserva->checkin->format('Y-m-d'),
                'checkout' => $reserva->checkout->format('Y-m-d'),
                'adultos' => $reserva->adultos,
                'niños' => $reserva->niños,
                "cliente" => [
                    'nombre' => $reserva->cliente->nombrecompleto,
                    'celular' => $reserva->cliente->celular,
                    'telefono' => $reserva->cliente->telefono,
                    'ciudad' => $reserva->cliente->ciudad,
                    'pais' => $reserva->cliente->pais,
                    'oficio' => $reserva->cliente->oficio,
                    'email' => $reserva->cliente->email,
                ],
                'habitacion' => [
                    'nombre' => $reserva->habitacion->nombre,
                    'num_habitacion' => $reserva->habitacion->num_habitacion,
                    'precio' => $reserva->habitacion->precio,
                    'foto' => $reserva->habitacion->fotourl,
                    'estado' => $reserva->habitacion->estado,
                ],
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Hospedajes Cliente
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam cliente_id int required Id del cliente. Example: 1
     * @response scenario=success {
     *       "id": 13,
     *       "checkin": "2021-05-20",
     *       "checkout": "2021-05-22",
     *       "adultos": 4,
     *       "niños": 2,
     *       "precio": "300.00",
     *       "estado": "Ocupado",
     *       "cliente": {
     *           "nombre": "Julian Gonzales Llanos",
     *           "celular": "62101485",
     *           "telefono": "42682265",
     *           "ciudad": "La Paz",
     *           "pais": "Bolivia",
     *           "oficio": "Albañil",
     *           "email": "julian@gmail.com"
     *       },
     *       "habitacion": {
     *           "nombre": "Habitacion 26",
     *           "num_habitacion": "26",
     *           "precio": "450.00",
     *           "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/habitaciones/habitacion_210521090607.jfif"
     *       },
     *       "transportes": [],
     *       "lugares": [
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-04",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           },
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-11",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           },
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-10",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           }
     *       ],
     *       "restaurante": [
     *           {
     *               "fecha": "2021-06-09",
     *               "hora": "17:35:40",
     *               "productos": [
     *                   {
     *                       "producto": "Pique macho",
     *                       "precio_producto": "100.00",
     *                       "opcion": "Papas fritas",
     *                       "tamaño": {
     *                           "nombre": "Pequeño",
     *                           "precio_tamaño": "40.00"
     *                       }
     *                   }
     *               ]
     *           },
     *           {
     *               "fecha": "2021-06-09",
     *               "hora": "18:40:48",
     *               "productos": [
     *                   {
     *                       "producto": "Pique macho",
     *                       "precio_producto": "100.00",
     *                       "opcion": "Papas fritas",
     *                       "tamaño": {
     *                           "nombre": "Pequeño",
     *                           "precio_tamaño": "40.00"
     *                       }
     *                   }
     *               ]
     *           }
     *       ],
     *       "totales": {
     *           "hospedaje": "300.00",
     *           "transportes": "0.00",
     *           "restaurante": "980.00",
     *           "lugarturistico": "1,500.00",
     *           "totalpagar": "2,780.00"
     *       }
     * }
     */
    public function mishospedajes(Request $request)
     {
        $hospedajes = Hospedaje::where('cliente_id',$request->post('cliente_id'))->orderBy('id','DESC')->get();
        $detalles = [];
        foreach ($hospedajes as $hospedaje) {
            array_push($detalles, [
                'id' => $hospedaje->id,
                'checkin' => $hospedaje->fecha_checkin,
                'checkout' => $hospedaje->fecha_checkout,
                'adultos' => $hospedaje->adultos,
                'niños' => $hospedaje->niños,
                'precio' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                'estado' => $hospedaje->estado,
                "cliente" => [
                    'nombre' => $hospedaje->cliente->nombrecompleto,
                    'celular' => $hospedaje->cliente->celular,
                    'telefono' => $hospedaje->cliente->telefono,
                    'ciudad' => $hospedaje->cliente->ciudad,
                    'pais' => $hospedaje->cliente->pais,
                    'oficio' => $hospedaje->cliente->oficio,
                    'email' => $hospedaje->cliente->email,
                ],
                'habitacion' => [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ],
                'transportes' => $hospedaje->detalletransportes->map(function($detalle){
                    return[
                        'nombre' => $detalle->transporte->nombre,
                        'precio' => $detalle->precio,
                        'foto' => $detalle->transporte->fotourl,
                    ];
                }),
                'lugares' => $hospedaje->lugares->map(function($detalle){
                    return[
                        'nombre' => $detalle->lugarturistico->nombre,
                        'precio' => $detalle->precio,
                        'fecha' => $detalle->fecha,
                        'tipo' => $detalle->lugarturistico->tipo,
                        'foto' => $detalle->lugarturistico->fotourl,
                    ];
                }),
                'restaurante' => $hospedaje->restaurantes->map(function($detalle){
                    return[
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function($producto)use($detalle){
                            return[
                                'producto' => $producto->producto->nombre,
                                'precio_producto' => $detalle->detalle->precio,
                                'opcion' => $producto->producto->opcion->nombre,
                                'tamaño' =>[
                                    'nombre' => $producto->producto->tamano->nombre,
                                    'precio_tamaño' => $detalle->detalle->detalleproducto->precio_tamanho,
                                ],
                            ];
                        }),
                    ];
                }),
                'cafeteria' => $hospedaje->cafeterias->map(function($detalle){
                    return[
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function($producto)use($detalle){
                            return[
                                'producto' => $producto->producto->nombre,
                                'precio_producto' => $detalle->detalle->precio,
                                'opcion' => $producto->producto->opcion->nombre,
                                'tamaño' =>[
                                    'nombre' => $producto->producto->tamano->nombre,
                                    'precio_tamaño' => $detalle->detalle->detalleproducto->precio_tamanho,
                                ],
                            ];
                        }),
                    ];
                }),
                'totales' => [
                    'hospedaje' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                    'transportes' => number_format(pageTotal($hospedaje->detalletransportes, 'precio'),2),
                    'restaurante' => number_format(pageTotal($hospedaje->restaurantes,'total'),2),
                    'cafeteria' => number_format(pageTotal($hospedaje->cafeterias,'total'),2),
                    'lugarturistico' => number_format(pageTotal($hospedaje->lugares, 'precio'),2),
                    'totalpagar' => number_format($hospedaje->total(),2),
                ],
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }


   public function mishospedajesocupados(Request $request)
    {
       $hospedajes = Hospedaje::where('cliente_id',$request->post('cliente_id'))->where('estado','Ocupado')->orderBy('id','DESC')->get();
       $detalles = [];
       foreach ($hospedajes as $hospedaje) {
           array_push($detalles, [
               'id' => $hospedaje->id,
               'checkin' => $hospedaje->fecha_checkin,
               'checkout' => $hospedaje->fecha_checkout,
               'adultos' => $hospedaje->adultos,
               'niños' => $hospedaje->niños,
               'precio' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
               'estado' => $hospedaje->estado,
               "cliente" => [
                   'nombre' => $hospedaje->cliente->nombrecompleto,
                   'celular' => $hospedaje->cliente->celular,
                   'telefono' => $hospedaje->cliente->telefono,
                   'ciudad' => $hospedaje->cliente->ciudad,
                   'pais' => $hospedaje->cliente->pais,
                   'oficio' => $hospedaje->cliente->oficio,
                   'email' => $hospedaje->cliente->email,
               ],
  'habitacion' => [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ],
          
        
             
           ]);
       }
       return response()->json(['success' => 'true', 'data' => $detalles], 200);
   }
    /**
     * Reserva transportes
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam datos array datos transporte. Example:{
     *       "datos":[
	 *	               {
	 *		              "transporte_id":"2",
	 *		              "precio":"25",
     *                    "hospedaje_id":"13"
	 *	               },
	 *	               {
	 *		               "transporte_id":"2",
	 *		               "precio":"25",
     *                     "hospedaje_id":"13"
	 *	                }
	 *               ]
     *            }
     */
    public function reservatransporte(Request $request)
    {
        $detalle = new HospedajeDetalleTransporte();
        $detalle->hospedaje_id = $request->post('hospedaje_id');
        $detalle->transporte_id = $request->post('transporte_id');
        $detalle->precio = $request->post('precio');
        $detalle->fecha = date('Y-m-d');
        $detalle->save();
        return response()->json(['success' => 'true', 'data' => 'Transportes agregados'], 200);
    }
    /**
     * Reservas Lugar Turistico
     * 
     * @bodyParam cliente_id integer required Id del cliente. Example: 5
     * @bodyParam lugar_turistico_id integer required Id del lugar turistico. Example: 1
     * @bodyParam fecha date required Fecha de registro reserva . Example: 2021-06-10
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam precio number required Precio del recorrido Lugar Turistico. Example: 500
     * @response scenario=success {
     *   "success": "true",
     *   "data": "Lugar Turistico reservado"
     * }
     */
    public function reservalugarturistico(Request $request)
    {
        $reserva = new ReservaLugarTuristico();
        $reserva->cliente_id = $request->post('cliente_id');
        $reserva->lugar_turistico_id = $request->post('lugar_turistico_id');
        $reserva->fecha = $request->post('fecha');
        $reserva->estado = 'Activo';
        $reserva->hospedaje_id = $request->post('hospedaje_id');
        $reserva->precio = $request->post('precio');
        $reserva->save();
        Socket::emmit();
        return response()->json(['success' => 'true', 'data' => 'Lugar Turistico reservado'], 200);
    }
    /**
     * Reservas Restaurante
     * 
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam toal number required Total pedidos productos restaurante. Example: 600
     * @bodyParam producto_id integer required Id del producto reservado . Example: 1
     * @bodyParam precio number required Precio del producto. Example: 100
     * @bodyParam cantidad number required Cantidad de productos reservados. Example: 3
     * @bodyParam opcion_id integer required Id de la opcion del producto. Example: 1
     * @bodyParam tamano_id integer required Ide del tamaño producto. Example: 2
     * @bodyParam preciotamano number required Precio del tamaño producto. Example: 40
     * @bodyParam datos array datos transporte. Example:{
     *      "hospedaje_id":"10",
     *      "total":"600",
     *       "datos":[
     *           {
     *               "producto_id":"1",
     *               "cantidad":"2",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           },
     *           {
     *               "producto_id":"1",
     *               "cantidad":"3",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           }
     *       ]
     *   }
     * @response scenario=success {
     *   "success": "true",
     *   "data": "Productos Agregados"
     * }
     */
    public function reservarestaurante(Request $request)
    {
        $restaurante = new ReservaRestaurante();
        $restaurante->hospedaje_id = $request->post('hospedaje_id');
        $restaurante->cliente_id = $request->post('cliente_id');
        $restaurante->fecha = date('Y-m-d');
        $restaurante->hora = date('H:i:s');
        $restaurante->total = $request->post('total');
        $restaurante->save();

        //DETALLE RESERVA
        $detalles = $request->post('datos');
        foreach ($detalles as $value) {
            $detalle = new RestauranteDetalleReserva();
            $detalle->restaurante_reserva_id = $restaurante->id;
            $detalle->restaurante_producto_id = $value['producto_id'];
            $detalle->precio = $value['precio'];
            $detalle->cantidad = $value['cantidad'];
            $detalle->save();

            $detalleproducto = new RestauranteDetalleReservaProducto();
            $detalleproducto->restaurante_detalle_reserva_id = $detalle->id;
            $detalleproducto->restaurante_producto_opciones_id = $value['opcion_id'];
            $detalleproducto->restaurante_producto_tamanho_id = $value['tamano_id'];
            $detalleproducto->precio_tamanho = $value['preciotamano'];
            $detalleproducto->save();
        }
        Socket::emmit();
        return response()->json(['success' => 'true', 'data' => 'Productos Agregados'], 200);
    }
    /**
     * Listado de Categorias Cafeteria
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "adasdasfasf",
     *       "descripcion": "<p>safasfasfasfa</p>",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/cafeteria/categorias/cafeteriacategoria_210422153310.jpg"
     * }
     */
    public function cafeteriacategorias()
    {
        $categorias = CafeteriaCategoria::all();
        $detalles = [];
        foreach ($categorias as $categoria) {
            array_push($detalles, [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion,
                'foto' => $categoria->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Listado de Productos Cafeteria segun a la Categoria que pertenecen
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam categoria_id int required Id de la categoria del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/cafeteria/productos/producto_210423115837.jpg"
     * }
     */
    public function cafeteriaproductos(Request $request)
    {
        $productos = CafeteriaProducto::where('cafeteria_categoria_id', $request->post('categoria_id'))->get();
        $detalles = [];
        foreach ($productos as $producto) {
            array_push($detalles, [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'foto' => $producto->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Deatelle Producto Cafeteria
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam producto_id int required Id del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/laravel/public/imagenes/cafeteria/productos/producto_210423115837.jpg"
     * }
     */
    public function cafeteriaproductodetalle(Request $request)
    {
        $producto = CafeteriaProducto::where('id', $request->post('producto_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'foto' => $producto->fotourl,
            'galeria' => $producto->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
            'opciones' => $producto->opciones->map(function ($opcion) {
                return [
                    'id' => $opcion->id,
                    'nombre' => $opcion->nombre,
                ];
            }),
            'tamanos' => $producto->tamanos->map(function ($tamano) {
                return [
                    'id' => $tamano->id,
                    'nombre' => $tamano->nombre,
                    'precio' => $tamano->precio,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
    /**
     * Reservas Restaurante
     * 
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam toal number required Total pedidos productos restaurante. Example: 600
     * @bodyParam producto_id integer required Id del producto reservado . Example: 1
     * @bodyParam precio number required Precio del producto. Example: 100
     * @bodyParam cantidad number required Cantidad de productos reservados. Example: 3
     * @bodyParam opcion_id integer required Id de la opcion del producto. Example: 1
     * @bodyParam tamano_id integer required Ide del tamaño producto. Example: 2
     * @bodyParam preciotamano number required Precio del tamaño producto. Example: 40
     * @bodyParam datos array datos transporte. Example:{
     *      "hospedaje_id":"10",
     *      "total":"600",
     *       "datos":[
     *           {
     *               "producto_id":"1",
     *               "cantidad":"2",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           },
     *           {
     *               "producto_id":"1",
     *               "cantidad":"3",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           }
     *       ]
     *   }
     * @response scenario=success {
     *   "success": "true",
     *   "data": "Productos Agregados"
     * }
     */
    public function reservacafeteria(Request $request)
    {
        $cafeteria = new ReservaCafeteria();
        $cafeteria->hospedaje_id = $request->post('hospedaje_id');
        $cafeteria->cliente_id = $request->post('cliente_id');
        $cafeteria->fecha = date('Y-m-d');
        $cafeteria->hora = date('H:i:s');
        $cafeteria->total = $request->post('total');
        $cafeteria->save();

        //DETALLE RESERVA
        $detalles = $request->post('datos');
        foreach ($detalles as $value) {
            $detalle = new CafeteriaDetalleReserva();
            $detalle->cafeteria_reserva_id = $cafeteria->id;
            $detalle->cafeteria_producto_id = $value['producto_id'];
            $detalle->precio = $value['precio'];
            $detalle->cantidad = $value['cantidad'];
            $detalle->save();

            $detalleproducto = new CafeteriaDetalleReservaProducto();
            $detalleproducto->cafeteria_detalle_reserva_id = $detalle->id;
            $detalleproducto->cafeteria_producto_opciones_id = $value['opcion_id'];
            $detalleproducto->cafeteria_producto_tamanho_id = $value['tamano_id'];
            $detalleproducto->precio_tamanho = $value['preciotamano'];
            $detalleproducto->save();
        }
        Socket::emmit();
        return response()->json(['success' => 'true', 'data' => 'Productos Agregados'], 200);
    }

public function misReservasRestaurante(Request $request)
    {
        $hospedajes = ReservaRestaurante::where('cliente_id',$request->post('cliente_id'))->get();
        $detalles = [];
        foreach ($hospedajes as $hospedaje) {
            array_push($detalles, [
                'id' => $hospedaje->id,
                'checkin' => $hospedaje->fecha_checkin,
                'checkout' => $hospedaje->fecha_checkout,
                'adultos' => $hospedaje->adultos,
                'niños' => $hospedaje->niños,
                'precio' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                'estado' => $hospedaje->estado,
                'habitacion' => [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ],
                'restaurante' => $hospedaje->restaurantes->map(function($detalle){
                    return[
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function($producto)use($detalle){
                            return[
                                'producto' => $producto->producto->nombre,
                                'precio_producto' => $detalle->detalle->precio,
                                'opcion' => $producto->producto->opcion->nombre,
                                'tamaño' =>[
                                    'nombre' => $producto->producto->tamano->nombre,
                                    'precio_tamaño' => $detalle->detalle->detalleproducto->precio_tamanho,
                                ],
                            ];
                        }),
                    ];
                }),
               
                'totales' => [
                    'restaurante' => number_format(pageTotal($hospedaje->restaurantes,'total'),2),
                    'totalpagar' => number_format($hospedaje->total(),2),
                ],
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
}