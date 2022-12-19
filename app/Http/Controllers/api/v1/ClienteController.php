<?php

namespace App\Http\Controllers\api\v1;

use Carbon\Carbon;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    /**
     * Perfil de Cliente.
     * 
     * @group Cliente
     * @bodyParam cliente_id int required Id del cliente para mostrar el detalle de su perfil. Example: 7
     * @response scenario=success {
     *    "success": "true",
     *    "data": {
     *        "id": 7,
     *        "nombres": "Marina",
     *        "apellidos": "Mamani Chari",
     *        "tipo_documento": "Ci",
     *        "num_documento": "8831417",
     *        "celular": "75977665",
     *        "direccion": "Tiqupaya zona quintanilla",
     *        "ciudad": "Cochabamba",
     *        "pais": "Bolivia",
     *        "oficio": "Informatica",
     *        "empresa": "ENCORA",
     *        "telefono": "43243223",
     *        "email": "marina@gmail.com",
     *        "fecha_nacimiento": "1992-12-22",
     *        "motivo_viaje": "Recreacion",
     *        "foto": null,
     *        "imei_celular": null,
     *        "reservas": [
     *            {
     *                "id": 4,
     *                "checkin": "2022-12-05T17:07:00.000000Z",
     *                "checkout": "2022-12-09T17:07:00.000000Z",
     *                "adultos": 2,
     *                "niños": 1,
     *                "cliente_id": 7,
     *                "habitacion_id": 3,
     *                "estado": "Activo",
     *                "habitacion": {
     *                    "id": 3,
     *                    "nombre": "Habitación Matrimonial Superior N°03",
     *                    "descripcion": "<h2><strong>Matrimonial Superior</strong></h2>\r\n\r\n<ul>\r\n\t<li>Check in a partir de las 14:00</li>\r\n\t<li>televisor LED</li>\r\n\t<li>Tv Cable</li>\r\n\t<li>Internet Wifi en todo el hotel</li>\r\n\t<li>Desayuno Buffet Americano</li>\r\n\t<li>Caja de Seguridad</li>\r\n\t<li>Piscina atemperada</li>\r\n\t<li>Sauna vapor</li>\r\n\t<li>Servicio de telefon&iacute;a nacional e internacional</li>\r\n\t<li>Parqueo Privado</li>\r\n</ul>",
     *                    "num_habitacion": "03",
     *                    "foto": "https://c2210260.ferozo.com/imagenes/habitaciones/habitacion_221129223853.jpg",
     *                    "precio": "450.00",
     *                    "capacidad_minima": 1,
     *                    "capacidad_maxima": 1,
     *                    "estado": "Ocupado",
     *                    "habitacion_categoria_id": 8,
     *                    "categoria": {
     *                        "id": 8,
     *                        "nombre": "Habitación Matrimonial Superior",
     *                        "descripcion": "<p>Habitaci&oacute;n individual de 25 metros cuadrados para 2 personas</p>",
     *                        "foto": "https://c2210260.ferozo.com/imagenes/habitaciones/categorias/habitacioncategoria_221129220607.jpg"
     *                    }
     *                }
     *            }
     *        ],
     *        "hospedajes": [
     *            {
     *                "id": 4,
     *                "fecha_checkin": "2022-12-05 13:07:00",
     *                "fecha_checkout": "2022-12-09 13:07:00",
     *                "niños": 1,
     *                "adultos": 2,
     *                "precio": "450.00",
     *                "precio_promocion": null,
     *                "estado": "Ocupado",
     *                "cliente_id": 7,
     *                "habitacion_id": 3,
     *                "habitacion": {
     *                    "id": 3,
     *                    "nombre": "Habitación Matrimonial Superior N°03",
     *                    "descripcion": "<h2><strong>Matrimonial Superior</strong></h2>\r\n\r\n<ul>\r\n\t<li>Check in a partir de las 14:00</li>\r\n\t<li>televisor LED</li>\r\n\t<li>Tv Cable</li>\r\n\t<li>Internet Wifi en todo el hotel</li>\r\n\t<li>Desayuno Buffet Americano</li>\r\n\t<li>Caja de Seguridad</li>\r\n\t<li>Piscina atemperada</li>\r\n\t<li>Sauna vapor</li>\r\n\t<li>Servicio de telefon&iacute;a nacional e internacional</li>\r\n\t<li>Parqueo Privado</li>\r\n</ul>",
     *                    "num_habitacion": "03",
     *                    "foto": "https://c2210260.ferozo.com/imagenes/habitaciones/habitacion_221129223853.jpg",
     *                    "precio": "450.00",
     *                    "capacidad_minima": 1,
     *                    "capacidad_maxima": 1,
     *                    "estado": "Ocupado",
     *                    "habitacion_categoria_id": 8,
     *                    "categoria": {
     *                        "id": 8,
     *                        "nombre": "Habitación Matrimonial Superior",
     *                        "descripcion": "<p>Habitaci&oacute;n individual de 25 metros cuadrados para 2 personas</p>",
     *                        "foto": "https://c2210260.ferozo.com/imagenes/habitaciones/categorias/habitacioncategoria_221129220607.jpg"
     *                    }
     *                },
     *                "detalletransportes": [
     *                    {
     *                        "id": 1,
     *                        "precio": "20.00",
     *                        "fecha": "2022-12-02",
     *                        "hospedaje_id": 4,
     *                        "transporte_id": 1,
     *                        "transporte": {
     *                            "id": 1,
     *                            "nombre": "Mobil Suecia",
     *                            "descripcion": "<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Lorem_ipsum\">Wikipedia</a></p>",
     *                            "precio": "20.00",
     *                            "foto": "https://c2210260.ferozo.com/imagenes/transportes/transporte_221202144005.jpg"
     *                        }
     *                    }
     *                ],
     *                "detalleacompanantes": [],
     *                "detallefrigobars": [
     *                    {
     *                        "id": 1,
     *                        "nombre": "Coca cola 3 Lts.",
     *                        "precio": "13.00",
     *                        "cantidad": 1,
     *                        "hospedaje_id": 4
     *                    },
     *                    {
     *                        "id": 2,
     *                        "nombre": "Maruchan vaso",
     *                        "precio": "10.00",
     *                        "cantidad": 2,
     *                        "hospedaje_id": 4
     *                    }
     *                ],
     *                "restaurantes": [
     *                    {
     *                        "id": 1,
     *                        "cliente_id": null,
     *                        "hospedaje_id": 4,
     *                        "fecha": "2022-12-02",
     *                        "hora": "15:31:39",
     *                        "total": "80.00",
     *                        "detalles": [
     *                            {
     *                                "id": 1,
     *                                "restaurante_reserva_id": 1,
     *                                "restaurante_producto_id": 1,
     *                                "precio": "40.00",
     *                                "cantidad": 1,
     *                                "producto": {
     *                                    "id": 1,
     *                                    "nombre": "Pique Macho Cochabambino",
     *                                    "descripcion": "<p>El Pique Macho es un plato cochabambino que se ha vuelto muy popular en todo Bolivia por su sabor picante.</p>",
     *                                    "precio": "40.00",
     *                                    "foto": "producto_221130020930.jpg",
     *                                    "restaurante_categoria_id": 1
     *                                },
     *                                "detallesproductos": [
     *                                    {
     *                                        "id": 1,
     *                                        "restaurante_detalle_reserva_id": 1,
     *                                        "restaurante_producto_opciones_id": 2,
     *                                        "restaurante_producto_tamano_id": 2,
     *                                        "precio_tamanho": "40.00",
     *                                        "created_at": null,
     *                                        "updated_at": null,
     *                                        "deleted_at": null,
     *                                        "opcion": {
     *                                            "id": 2,
     *                                            "nombre": "Con llajuita",
     *                                            "restaurante_producto_id": 1
     *                                        },
     *                                        "tamaño": {
     *                                            "id": 2,
     *                                            "nombre": "Personal",
     *                                            "precio": "40.00",
     *                                            "restaurante_producto_id": 1
     *                                        }
     *                                    }
     *                                ]
     *                            }
     *                        ]
     *                    }
     *                ],
     *                "cafeterias": [
     *                    {
     *                        "id": 1,
     *                        "fecha": "2022-12-02",
     *                        "hora": "16:06:54",
     *                        "total": "50.00",
     *                        "cliente_id": null,
     *                        "hospedaje_id": 4,
     *                        "detalles": [
     *                            {
     *                                "id": 1,
     *                                "precio": "10.00",
     *                                "cantidad": 1,
     *                                "cafeteria_reserva_id": 1,
     *                                "cafeteria_producto_id": 1,
     *                                "producto": {
     *                                    "id": 1,
     *                                    "nombre": "Café",
     *                                    "descripcion": "<p>Caf&eacute; tri-varietal (Typica, Caturra y Catuai) de altura, cuyos granos son cultivados entre los 1600 y 1800 MSNM en los municipios de Caranavi y Coroico en los Yungas Pace&ntilde;os.</p>",
     *                                    "precio": "10.00",
     *                                    "foto": "producto_221130020345.jpg",
     *                                    "cafeteria_categoria_id": 1
     *                                },
     *                                "detallesproductos": []
     *                            }
     *                        ]
     *                    },
     *                    {
     *                        "id": 2,
     *                        "fecha": "2022-12-02",
     *                        "hora": "16:12:57",
     *                        "total": "50.00",
     *                        "cliente_id": null,
     *                        "hospedaje_id": 4,
     *                        "detalles": [
     *                            {
     *                                "id": 2,
     *                                "precio": "10.00",
     *                                "cantidad": 1,
     *                                "cafeteria_reserva_id": 2,
     *                                "cafeteria_producto_id": 1,
     *                                "producto": {
     *                                    "id": 1,
     *                                    "nombre": "Café",
     *                                    "descripcion": "<p>Caf&eacute; tri-varietal (Typica, Caturra y Catuai) de altura, cuyos granos son cultivados entre los 1600 y 1800 MSNM en los municipios de Caranavi y Coroico en los Yungas Pace&ntilde;os.</p>",
     *                                    "precio": "10.00",
     *                                    "foto": "producto_221130020345.jpg",
     *                                    "cafeteria_categoria_id": 1
     *                                },
     *                                "detallesproductos": [
     *                                    {
     *                                        "id": 1,
     *                                        "precio_tamanho": "40.00",
     *                                        "cafeteria_detalle_reserva_id": 2,
     *                                        "cafeteria_producto_opciones_id": 2,
     *                                        "cafeteria_producto_tamano_id": 2,
     *                                        "created_at": null,
     *                                        "updated_at": null,
     *                                        "deleted_at": null,
     *                                        "opcion": {
     *                                            "id": 2,
     *                                            "nombre": "Super cargado",
     *                                            "cafeteria_producto_id": 1
     *                                        },
     *                                        "tamaño": {
     *                                            "id": 2,
     *                                            "nombre": "Grande",
     *                                            "precio": "40.00",
     *                                            "cafeteria_producto_id": 1
     *                                        }
     *                                    }
     *                                ]
     *                            }
     *                        ]
     *                    }
     *                ]
     *            }
     *        ]
     *    }
     *}
     */
    public function perfil(Request $request)
    {
        $cliente = Cliente::findOrFail($request->post('cliente_id'))->makeHidden('api_token');
        $data = $cliente->ToArray();

        $data['reservas'] = $cliente->reservas->map(function ($item) {
            $res = $item->toArray();
            $habitacion = $item->habitacion;
            $res['habitacion'] = $habitacion;
            $res['habitacion']['foto'] = $habitacion->foto_url;
            $res['habitacion']['total'] = $habitacion->total;
            if ($item->habitacion) {
                $categoria = $item->habitacion->categoria;
                $res['habitacion']['categoria'] = $categoria;
                $res['habitacion']['categoria']['foto'] = $categoria->foto_url;
            }
            return $res;
        });
        $data['hospedajes'] = $cliente->hospedajes->map(function ($item) {
            $res = $item->toArray();
            // habitacion
            $habitacion = $item->habitacion;
            $res['habitacion'] = $habitacion;
            $res['habitacion']['foto'] = $habitacion->foto_url;
            $res['habitacion']['total'] = $habitacion->total;
            if ($item->habitacion) {
                $categoria = $item->habitacion->categoria;
                $res['habitacion']['categoria'] = $categoria;
                $res['habitacion']['categoria']['foto'] = $categoria->foto_url;
            }
            // detalle transportes
            $res['detalletransportes'] = $item->detalletransportes->map(function($item) {
                $res = $item->toArray();
                $transporte = $item->transporte;
                $res['transporte'] = $transporte;
                $res['transporte']['foto'] = $transporte->foto_url;
                return $res;
            });
            // detalle acompanantes
            $res['detalleacompanantes'] = $item->detalleacompanantes;
            // detalle frigobar
            $res['detallefrigobars'] = $item->detallefrigobars;
            // reserva de restaurantes
            $res['restaurantes'] = $item->restaurantes->map(function ($item) {
                $res = $item->toArray();
                $res['detalles'] = $item->detalles->map(function($item) {
                    $res = $item->toArray();
                    $res['producto'] = $item->producto;
                    $res['detallesproductos'] = $item->detallesproductos->map(function($item) {
                        $res = $item->toArray();
                        $res['opcion'] = $item->opcion;
                        $res['tamaño'] = $item->tamaño;
                        return $res;
                    });
                    return $res;
                });
                return $res;
            });
            // cafeteria
            $res['cafeterias'] = $item->cafeterias->map(function ($item) {
                $res = $item->toArray();
                $res['detalles'] = $item->detalles->map(function($item) {
                    $res = $item->toArray();
                    $res['producto'] = $item->producto;
                    $res['detallesproductos'] = $item->detallesproductos->map(function($item) {
                        $res = $item->toArray();
                        $res['opcion'] = $item->opcion;
                        $res['tamaño'] = $item->tamaño;
                        return $res;
                    });
                    return $res;
                });
                return $res;
            });
            return $res;
        });
        
        return response()->json([
            'success' => 'true', 
            'data' => $data
        ], 200);
    }

    /**
     * Editar perfil Cliente.
     * 
     * @group Cliente
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
            }
        }
        return response()->json(['success' => 'false', 'data' => 'El cliente no existe'], 400);
    }
}