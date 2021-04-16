<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

function setActiveRoute($name)
{
    return request()->routeIs($name) ? 'active' : '';
}

function routerequest($name)
{
    return request()->routeIs($name);
}

function urlpath($path)
{
    return URL::to('laravel/public').$path;
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
                ],
            ],
        ];
    return $p;
}