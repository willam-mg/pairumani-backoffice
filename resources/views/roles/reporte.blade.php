<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <title>Reporte</title>
    </head>
    <body>
        <h2 class="text-center">Reporte de Roles</h2>
        <table class="table table-bordered">
            <thead style="background-color:#A9D0F5; font-size: 10px;" border="0.5">
                <tr bgcolor="skyblue" class="text-center">
                    <th><center>Nombre</center></th>
                    <th><center>Descripcion</center></th>
                </tr>
            </thead>
            <tbody style="text-align: center; font-size: 10px; line-height: 2em">
                @foreach($roles as $rol)
                    <tr>
                        <td>{{$rol->nombre}}</td>
                        <td>{{$rol->descripcion}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>