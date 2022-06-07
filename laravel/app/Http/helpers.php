<?php

use App\Models\Hospedaje;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

function setActiveRoute($name)
{
    return request()->routeIs($name) ? 'active' : '';
}

function setActiveRouteShow($name)
{
    return request()->routeIs($name) ? 'show' : '';
}

function setActiveRouteExpanded($name)
{
    return request()->routeIs($name) ? 'true' : 'false';
}

function routerequest($name)
{
    return request()->routeIs($name);
}

function urlpath($path)
{
    return URL::to('laravel/public').$path;
}

function updatehospedaje()
{
    $hospedajes = Hospedaje::where('estado','Ocupado')->get();
    foreach ($hospedajes as $hospedaje) {
        $checkoutdia = date("Y-m-d H:i",strtotime($hospedaje->fecha_checkout."+ 1 days"));
        $hoy = date('Y-m-d H:i');
        if($hoy >= $checkoutdia){
            $hospedaje->estado = 'Desocupado';
            $hospedaje->save();
            $hospedaje->habitacion->estado = 'Disponible';
            $hospedaje->habitacion->save();
        }
    }
}

function datetime($date)
{
    // return date('Y-m-d\TH:i', strtotime($date));
    return Carbon::parse($date)->format('Y-m-d\TH:i');
}

function pageTotal($provider, $fieldName)
{
    $total = 0;
    foreach ($provider as $item) {
        $total += $item[$fieldName];
    }
    return $total;
}

function crearimagen($ifimage,$image,$name,$ruta)
{
    if ($ifimage) {
        $file = $image;
        $imageName = $name . '.' . $file->getClientOriginalExtension();
        $file->move($ruta, $imageName);
        return $imageName;
    }
}

function editarimagen($ifimage,$image,$name,$ruta,$model,$urldelte)
{
    if($ifimage) {
        if ($model != "") {
            $imageExist = $ruta . $model;
            if (file_exists($imageExist)) {
                unlink($imageExist);
            }
        }
        $Image = $urldelte . $model; // get previous image from folder
        if (File::exists($Image)) { // unlink or remove previous image from folder
            unlink($Image);
        }
        $file = $image;
        $imageName = $name . '.' . $file->getClientOriginalExtension();
        $file->move($ruta, $imageName);
        return $imageName;
    }else{
        return $model;
    }
}

function eliminarimagen($model,$ruta, $urldelete)
{
    if ($model != "") {
        $imageExist = $ruta. $model;
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
    }
    $Image = $urldelete . $model; // get previous image from folder
    if (File::exists($Image)) { // unlink or remove previous image from folder
        unlink($Image);
    }
}

function base64_to_jpeg($base64_string, $output_file,$path)
{
    // open the output file for writing
    $ifp = fopen($path . $output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);
    if (count($data) > 1) {
        $dataText = $data[1];
    } else {
        $dataText = $base64_string;
    }

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($dataText));

    // clean up the file resource
    fclose($ifp);

    return $output_file; 
}

// Key Value From Json
function kvfj($json, $key)
{
    if($json == "null"){
        return null;
    }else{
        $json = $json;
        $json = json_decode($json, true);
        if(array_key_exists($key, $json)){
            return $json[$key];
        }else{
            return null;
        }   
    }
}

function user_permissions()
{
    $p = [
            'roles' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">privacy_tip</i>',
                'title' => 'Módulo de roles',
                'keys' => [
                    'roles_index' => 'Puede ver la lista de roles.',
                    'roles_create' => 'Puede agregar nuevos roles.',
                    'roles_edit' => 'Puede editar roles.',
                    'roles_destroy' => 'Puede eliminar roles.',
                    'roles_reporte' => 'Puede descargar un reporte.',
                    'roles_permisos' => 'Puede ver todos los permisos asignados a este rol'
                ],
            ],
            'usuarios' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">people_alt</i>',
                'title' => 'Módulo de Usuarios',
                'keys' => [
                    'usuarios_index' => 'Puede ver la lista de usuarios.',
                    'usuarios_create' => 'Puede agregar nuevos usuarios.',
                    'usuarios_edit' => 'Puede editar usuarios.',
                    'usuarios_destroy' => 'Puede eliminar usuarios.',
                    'usuarios_reporte' => 'Puede descargar un reporte.',
                    'usuarios_show' => 'Puede ver los roles asiganos al usuario.',
                ],
            ],
            'clientes' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">people_alt</i>',
                'title' => 'Módulo de Clientes',
                'keys' => [
                    'clientes_index' => 'Puede ver la lista de clientes.',
                    'clientes_create' => 'Puede agregar nuevos clientes.',
                    'clientes_show' => 'Puede ver el detalle del cliente.',
                    'clientes_edit' => 'Puede editar clientes.',
                    'clientes_destroy' => 'Puede eliminar un cliente.',
                ],
            ],
            'acompañantes' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">people_alt</i>',
                'title' => 'Módulo de Acompañantes',
                'keys' => [
                    'acompanantes_index' => 'Puede ver la lista de acompañantes.',
                    'acompanantes_create' => 'Puede agregar nuevos acompañantes.',
                    'acompanantes_show' => 'Puede ver el detalle del acompañante.',
                    'acompanantes_edit' => 'Puede editar acompañantes.',
                    'acompanantes_destroy' => 'Puede eliminar un acompañante.',
                ],
            ],
            'eventos' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">event</i>',
                'title' => 'Módulo de Eventos',
                'keys' => [
                    'eventos_index' => 'Puede ver la lista de eventos.',
                    'eventos_create' => 'Puede agregar nuevos eventos.',
                    'eventos_show' => 'Puede ver el detalle del evento.',
                    'eventos_edit' => 'Puede editar eventos.',
                    'eventos_destroy' => 'Puede eliminar un evento.',
                    'eventos_galeria' => 'Puede agregar multiples fotos al evento',
                    'eventos_galeria_destroy' => 'Puede eliminar fotos de la galeria',
                ],
            ],
            'habitacióncategoria' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">assignment</i>',
                'title' => 'Módulo de Habitación Categoria',
                'keys' => [
                    'habitacioncategorias_index' => 'Puede ver la lista de categorias.',
                    'habitacioncategorias_create' => 'Puede agregar nuevas categorias.',
                    'habitacioncategorias_show' => 'Puede ver el detalle de la categoria.',
                    'habitacioncategorias_edit' => 'Puede editar categorias.',
                    'habitacioncategorias_destroy' => 'Puede eliminar una categoria.',
                ],
            ],
            'habitación' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">meeting_room</i>',
                'title' => 'Módulo de Habitación',
                'keys' => [
                    'habitaciones_index' => 'Puede ver la lista de habitaciones.',
                    'habitaciones_create' => 'Puede agregar nuevas habitaciones.',
                    'habitaciones_show' => 'Puede ver el detalle de la habitación.',
                    'habitaciones_edit' => 'Puede editar habitaciones.',
                    'habitaciones_destroy' => 'Puede eliminar una habitación.',
                    'habitaciones_galeria' => 'Puede agregar multiples fotos al evento',
                    'habitaciones_galeria_destroy' => 'Puede eliminar fotos de la galeria',
                ],
            ],
            'habitaciónreservas' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">pending_actions</i>',
                'title' => 'Módulo de Habitación Reservas',
                'keys' => [
                    'reservas_index' => 'Puede ver la lista de reservas.',
                    'reservas_create' => 'Puede agregar nuevas reservas.',
                    'reservas_show' => 'Puede ver el detalle de la reserva.',
                    'reservas_edit' => 'Puede editar reservas.',
                    'reservas_destroy' => 'Puede eliminar una reserva.',
                    'reservas_hospedaje' => 'Puede crear el hospedaje de una reserva.',
                ],
            ],
            'habitaciónfrigobar' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">kitchen</i>',
                'title' => 'Módulo de Habitación frigobar',
                'keys' => [
                    'habitacionfrigobar_index' => 'Puede ver la lista de productos frigobar.',
                    'habitacionfrigobar_create' => 'Puede agregar nuevos productos al frigobar.',
                    'habitacionfrigobar_show' => 'Puede ver el detalle de un producto frigobar.',
                    'habitacionfrigobar_edit' => 'Puede editar un producto del frigobar.',
                    'habitacionfrigobar_destroy' => 'Puede eliminar un producto del frigobar.',
                ],
            ],
            'hospedajes' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">hotel</i>',
                'title' => 'Módulo de Hospedajes',
                'keys' => [
                    'hospedajes_index' => 'Puede ver la lista de hospedajes.',
                    'hospedajes_create' => 'Puede agregar nuevos hospedajes.',
                    'hospedajes_show' => 'Puede ver el detalle del hospedaje.',
                    'hospedajes_edit' => 'Puede editar hospedajes.',
                    'hospedajes_destroy' => 'Puede eliminar un hospedaje.',
                    'hospedajes_transporte' => 'Puede agregar multiples transportes al hospedaje.',
                    'hospedajes_transporte_destroy' => 'Puede eliminar un transporte del hospedaje.',
                    'hospedajes_reserva_lugar' => 'Puede crear reservas de lugares turisticos',
                    'hospedajes_reserva_productos' => 'Puede crear reservas de productos del restaurante',
                    'hospedajes_reserva_cafeteria_productos' => 'Puede crear reservas de productos de la cafeteria',
                    'hospedajes_frigobar' => 'Puede agregar multiples productos del frigobar',
                ],
            ],
            'restaurantecategorias' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">assignment</i>',
                'title' => 'Módulo de Restaurante Categorias',
                'keys' => [
                    'restaurantecategorias_index' => 'Puede ver la lista de categorias.',
                    'restaurantecategorias_create' => 'Puede agregar nuevas categorias.',
                    'restaurantecategorias_show' => 'Puede ver el detalle de la categoria.',
                    'restaurantecategorias_edit' => 'Puede editar categorias.',
                    'restaurantecategorias_destroy' => 'Puede eliminar una categoria.',
                ],
            ],
            'restauranteproductos' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">restaurant_menu</i>',
                'title' => 'Módulo de Restaurante Productos',
                'keys' => [
                    'productos_index' => 'Puede ver la lista de productos.',
                    'productos_create' => 'Puede agregar nuevos productos.',
                    'productos_show' => 'Puede ver el detalle del producto.',
                    'productos_edit' => 'Puede editar productos.',
                    'productos_destroy' => 'Puede eliminar un producto.',
                    'productos_galeria' => 'Puede agergar multiples fotos a un producto.',
                    'productos_galeria_destroy' => 'Puede eliminar una foto del producto.',
                ],
            ],
            'restauranteproductoopciones' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">grading</i>',
                'title' => 'Módulo de Restaurante Producto Opciones',
                'keys' => [
                    'opciones_index' => 'Puede ver la lista de opciones.',
                    'opciones_create' => 'Puede agregar nuevas opciones.',
                    'opciones_show' => 'Puede ver el detalle del opcion.',
                    'opciones_edit' => 'Puede editar opciones.',
                    'opciones_destroy' => 'Puede eliminar una opcion.',
                ],
            ],
            'restauranteproductotamaños' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">fastfood</i>',
                'title' => 'Módulo de Restaurante Producto Tamaños',
                'keys' => [
                    'tamanos_index' => 'Puede ver la lista de tamaños.',
                    'tamanos_create' => 'Puede agregar nuevos tamaños.',
                    'tamanos_show' => 'Puede ver el detalle del tamaño.',
                    'tamanos_edit' => 'Puede editar tamaños.',
                    'tamanos_destroy' => 'Puede eliminar un tamaño.',
                ],
            ],
            'restaurantereservas' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">restaurant</i>',
                'title' => 'Módulo de Reservas Restaurante',
                'keys' => [
                    'restaurantes_index' => 'Puede ver la lista de reservas del restaurante.',
                    'restaurantes_create' => 'Puede agregar nuevas reservas al restaurante.',
                    'restaurantes_show' => 'Puede ver el detalle de una reserva.',
                    'restaurantes_reporte' => 'Puede imprimir un recibo.',
                    'restaurantes_destroy' => 'Puede eliminar una reserva.',
                ],
            ],
            'cafeteriacategorias' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">assignment</i>',
                'title' => 'Módulo de Cafeteria Categorias',
                'keys' => [
                    'cafeteriacategorias_index' => 'Puede ver la lista de categorias.',
                    'cafeteriacategorias_create' => 'Puede agregar nuevas categorias.',
                    'cafeteriacategorias_show' => 'Puede ver el detalle de la categoria.',
                    'cafeteriacategorias_edit' => 'Puede editar categorias.',
                    'cafeteriacategorias_destroy' => 'Puede eliminar una categoria.',
                ],
            ],
            'cafeteriaproductos' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">restaurant_menu</i>',
                'title' => 'Módulo de Cafeteria Productos',
                'keys' => [
                    'cafeteria_productos_index' => 'Puede ver la lista de productos.',
                    'cafeteria_productos_create' => 'Puede agregar nuevos productos.',
                    'cafeteria_productos_show' => 'Puede ver el detalle del producto.',
                    'cafeteria_productos_edit' => 'Puede editar productos.',
                    'cafeteria_productos_destroy' => 'Puede eliminar un producto.',
                    'cafeteria_productos_galeria' => 'Puede agergar multiples fotos a un producto.',
                    'cafeteria_productos_galeria_destroy' => 'Puede eliminar una foto del producto.',
                ],
            ],
            'cafeteriaproductoopciones' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">grading</i>',
                'title' => 'Módulo de Cafeteria Producto Opciones',
                'keys' => [
                    'cafeteria_opciones_index' => 'Puede ver la lista de opciones.',
                    'cafeteria_opciones_create' => 'Puede agregar nuevas opciones.',
                    'cafeteria_opciones_show' => 'Puede ver el detalle del opcion.',
                    'cafeteria_opciones_edit' => 'Puede editar opciones.',
                    'cafeteria_opciones_destroy' => 'Puede eliminar una opcion.',
                ],
            ],
            'cafeteriaproductotamaños' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">fastfood</i>',
                'title' => 'Módulo de Cafeteria Producto Tamaños',
                'keys' => [
                    'cafeteria_tamanos_index' => 'Puede ver la lista de tamaños.',
                    'cafeteria_tamanos_create' => 'Puede agregar nuevos tamaños.',
                    'cafeteria_tamanos_show' => 'Puede ver el detalle del tamaño.',
                    'cafeteria_tamanos_edit' => 'Puede editar tamaños.',
                    'cafeteria_tamanos_destroy' => 'Puede eliminar un tamaño.',
                ],
            ],
            'cafeteriareservas' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">restaurant</i>',
                'title' => 'Módulo de Reservas Cafeteria',
                'keys' => [
                    'cafeteria_index' => 'Puede ver la lista de reservas del cafeteria.',
                    'cafeteria_create' => 'Puede agregar nuevas reservas al cafeteria.',
                    'cafeteria_show' => 'Puede ver el detalle de una reserva.',
                    'cafeteria_reporte' => 'Puede imprimir un recibo.',
                    'cafeteria_destroy' => 'Puede eliminar una reserva.',
                ],
            ],
            'promociones' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">campaign</i>',
                'title' => 'Módulo de Promociones',
                'keys' => [
                    'promociones_index' => 'Puede ver la lista de promociones.',
                    'promociones_create' => 'Puede agregar nuevas promociones.',
                    'promociones_show' => 'Puede ver el detalle de una promocion.',
                    'promociones_edit' => 'Puede editar promociones.',
                    'promociones_destroy' => 'Puede eliminar una promocion.',
                ],
            ],
            'promocionreservas' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">pending_actions</i>',
                'title' => 'Módulo de Reservas Promociones',
                'keys' => [
                    'promocionreservas_index' => 'Puede ver la lista de reservas.',
                    'promocionreservas_create' => 'Puede agregar nuevas reservas.',
                    'promocionreservas_show' => 'Puede ver el detalle de una reserva.',
                    'promocionreservas_edit' => 'Puede editar reservas.',
                    'promocionreservas_destroy' => 'Puede eliminar una reserva.',
                ],
            ],
            'lugaresturisticos' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">hiking</i>',
                'title' => 'Módulo de Lugares Turisticos',
                'keys' => [
                    'lugaresturisticos_index' => 'Puede ver la lista de lugares.',
                    'lugaresturisticos_create' => 'Puede agregar nuevos lugares.',
                    'lugaresturisticos_show' => 'Puede ver el detalle de un lugar.',
                    'lugaresturisticos_edit' => 'Puede editar lugares.',
                    'lugaresturisticos_destroy' => 'Puede eliminar un lugar.',
                    'lugaresturisticos_galeria' => 'Puede agergar multiples fotos a un lugar.',
                    'lugaresturisticos_galeria_destroy' => 'Puede eliminar una foto del lugar.',
                ],
            ],
            'lugaresturisticosreservas' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">pending_actions</i>',
                'title' => 'Módulo de Reservas Lugares Turisticos',
                'keys' => [
                    'reservaslugaresturisticos_index' => 'Puede ver la lista de reservas de lugares turisticos.',
                    'reservaslugaresturisticos_create' => 'Puede agregar nuevas reservas de lugares turisticos.',
                    'reservaslugaresturisticos_show' => 'Puede ver el detalle de un reserva.',
                    'reservaslugaresturisticos_edit' => 'Puede editar reservas.',
                    'reservaslugaresturisticos_destroy' => 'Puede eliminar una reserva.',
                    'reservaslugaresturisticos_hospedaje' => 'Puede asignar la reserva a un hospedaje.',
                ],
            ],
            'transportes' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">directions_car</i>',
                'title' => 'Módulo de Transportes',
                'keys' => [
                    'transportes_index' => 'Puede ver la lista de transportes.',
                    'transportes_create' => 'Puede agregar nuevas transportes.',
                    'transportes_show' => 'Puede ver el detalle de una transporte.',
                    'transportes_edit' => 'Puede editar transportes.',
                    'transportes_destroy' => 'Puede eliminar una transporte.',
                ],
            ],
            'hotel' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">hotel</i>',
                'title' => 'Módulo de Hotel',
                'keys' => [
                    'hotel_galeria' => 'Puede agergar multiples fotos al hotel.',
                    'hotel_galeria_destroy' => 'Puede eliminar una foto del hotel.',
                ],
            ],
            'reportes' => [
                'icon' => '<i class="material-icons" style="font-size: 40px">print</i>',
                'title' => 'Módulo de Reportes',
                'keys' => [
                    'reporte_ingresos_hospedajes' => 'Puede generar reporte de los ingresos del hospedaje.',
                    'reporte_ingresos_restaurante' => 'Puede generar reporte de los ingresos del restaurante.',
                    'reporte_ingresos_lugaresturisticos' => 'Puede generar reporte de los ingresos del lugar turistico.',
                    'reporte_ingresos_transportes' => 'Puede generar reporte de los ingresos transportes.',
                ],
            ],
        ];
    return $p;
}