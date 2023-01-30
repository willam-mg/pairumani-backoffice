<h2>Hola, Soy {{ $data->name }}</h2>
<br>
Detalle: <br>
<strong>Nombre: </strong>{{ $data->name }} <br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Asunto: </strong>{{ $data->subject }} <br>

<strong>Mensaje: </strong>
<p>
    {{ $data->user_query }} <br><br>
</p>

Gracias.