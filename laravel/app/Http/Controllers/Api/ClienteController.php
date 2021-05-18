<?php

namespace App\Http\Controllers\Api;

use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use Illuminate\Support\Str;
use App\Models\GaleriaHotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LugarTuristico;
use App\Events\RecoverPassword;
use Illuminate\Support\Facades\DB;
use App\Models\HabitacionCategoria;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\RestauranteCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'nombres' => 'required|unique:clientes',
            'apellidos' => 'required|unique:clientes',
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
     * Verificacion de email para cambio de password
     * 
     * @bodyParam email string required Verificacion que existe el email enviado. Example: cliente@gmail.com
     * @response scenario=success {
     *   "data": true,
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

        $respuesta = true;

        return response()->json(['success' => 'true', 'data' => $respuesta], 200);
    }
    /**
     * Verificacion de codigo enviado al email del cliente
     * 
     * @bodyParam codigo string required Verificacion que el codigo que se envio a su email coincidan. Example: 58741258
     * @response scenario=success {
     *   "data": true o false,
     * }
     */
    public function verificarcodigo(Request $request)
    {
        //recuperar la variable de sesion code
        $code = session('code');
        
        //verificar que los codigos sean iguales
        if($request->post('codigo') == $code){
            $respuesta = true;
        }else{
            $respuesta = false;
        }

        //destruir la variable se sesion
        session()->forget('code');

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

        return response()->json(['success' => 'true', 'data' => 'Se cambio la contraseña'], 200);
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
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'precio_promocion' => $habitacion->precio_promocion,
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
        $habitacion = Habitacion::find($request->post('habitacion_id'));
        $detalles = [];
        array_push($detalles,[
            'nombre' => $habitacion->nombre,
            'descripcion' => $habitacion->descripcion,
            'num_habitacion' => $habitacion->num_habitacion,
            'precio' => $habitacion->precio,
            'precio_promocion' => $habitacion->precio_promocion,
            'capacidad_minima' => $habitacion->capacidad_minima,
            'capacidad_maxima' => $habitacion->capacidad_maxima,
            'estado' => $habitacion->estado,
            'foto' => $habitacion->fotourl,
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
    public function Habitacionescategoria()
    {
        $habitaciones = Habitacion::where('estado','Disponible')->get();
        $detalles = [];
        foreach ($habitaciones as $habitacion) {
            array_push($detalles, [
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'precio_promocion' => $habitacion->precio_promocion,
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
        $promociones = Promocion::where('estado','Activo')->get();
        $detalles = [];
        foreach ($promociones as $promocion) {
            array_push($detalles, [
                'nombre' => $promocion->nombre,
                'descripcion' => $promocion->descripcion,
                'precio' => $promocion->precio,
                'estado' => $promocion->estado,
                'foto' => $promocion->fotourl,
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
                'nombre' => $transporte->nombre,
                'descripcion' => $transporte->descripcion,
                'precio' => $transporte->precio,
                'foto' => $transporte->fotourl,
            ]);
        }
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
                'nombre' => $evento->nombre,
                'descripcion' => $evento->descripcion,
                'fecha' => $evento->fecha,
                'foto' => $evento->fotourl,
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
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'foto' => $producto->fotourl,
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
     * @bodyParam niños int required Cantidad de niños en la habitacion. Example: 2
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
        $reserva->niños = $request->post('niños');
        $reserva->cliente_id = $request->post('cliente_id');
        $reserva->habitacion_id = $request->post('habitacion_id');
        $reserva->save();

        //cambio de estado de la habitacion
        $habitacion->estado = 'Reservado';
        $habitacion->save();

        return response()->json(['success' => 'true', 'data' => $reserva], 200);
    }
}
