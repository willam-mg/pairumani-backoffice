@component('mail::message')
# Codigo Recupearión de Contraseña

Utiliza este código para poder restablecer tu contraseña.

@component('mail::table')
|           Email         |      Código      |
| :---------------------- | :--------------- |
| {{ $cliente->email }}   |   {{ $code }}  |
@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
