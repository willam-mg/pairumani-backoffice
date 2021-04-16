<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <title>Reporte</title>
</head>
<body>
    <h2 class="text-center">Reporte de Usuarios</h2>
    <table class="table table-bordered">
        <thead style="font-size: 10px; text-align: center;" border="0.5">
            <tr bgcolor="skyblue">
                <th><center>Nombre</center></th>
                <th><center>Apellido</center></th>
                <th><center>Email</center></th>
                <th><center>Telefono</center></th>
                <th><center>Direción</center></th>
                <th><center>Rol</center></th>
            </tr>
        </thead>
        <tbody style="text-align: center; font-size: 10px; line-height: 2em">
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->rol->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>