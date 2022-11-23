# Endpoints


## CLIENTE - Login con redes sociales y normal




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "tipo_login": 1,
    "email": "cliente@gmail.com",
    "password": "cliente54782",
    "nombres": "Jose Rodrigo",
    "apellidos": "Cespedes Rojas",
    "tipo_documento": "Ci,Pasaporte",
    "num_documento": "657848455",
    "celular": "65582210",
    "direccion": "Av Potosi",
    "ciudad": "La Paz",
    "pais": "Bolivia",
    "oficio": "Ing Civil",
    "empresa": "YPFB",
    "telefono": "4652588",
    "fecha_nacimiento": "1985-03-22",
    "motivo_viaje": "Recreacion,Negocios,Salud,Otro",
    "foto": "https:\/\/www.facebook.com\/user1\/photo.jpg",
    "imei_celular": "354651100023680"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>tipo_login</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="tipo_login" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
El tipo de login que usara el cliente para iniciar sesion; 1 = Email login, 2 = gmail login,3 = facebook login.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Email que usa el cliente para el registro.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
La clave que usara para ingresar al sistema el cliente para el registro.
</p>
<p>
<b><code>nombres</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nombres" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
Los nombes del cliente para el registro.
</p>
<p>
<b><code>apellidos</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="apellidos" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
Los apellidos del cliente para el registro.
</p>
<p>
<b><code>tipo_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tipo_documento" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
El tipo de documento que tiene el cliente para el registro .
</p>
<p>
<b><code>num_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="num_documento" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Número de documento del cliente para el registro.
</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="celular" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
Número de celular del cliente para el registro.
</p>
<p>
<b><code>direccion</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="direccion" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Direccón del cliente para el registro.
</p>
<p>
<b><code>ciudad</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ciudad" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
La ciudad donde vive el cliente para el registro.
</p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pais" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
País donde vive el cliente para el registro.
</p>
<p>
<b><code>oficio</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="oficio" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
El trabajo que realiza el cliente para el registro.
</p>
<p>
<b><code>empresa</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="empresa" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
La empresa donde trabaja actualemnte el cliente para el registro.
</p>
<p>
<b><code>telefono</code></b>&nbsp;&nbsp;<small>Número</small>     <i>optional</i> &nbsp;
<input type="text" name="telefono" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
de telefono fijo del cliente para el registro.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Fecha de nacimiento del cliente para el registro.
</p>
<p>
<b><code>motivo_viaje</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="motivo_viaje" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Motivo por el cual viaja el cliente para el registro.
</p>
<p>
<b><code>foto</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="foto" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Foto que se registrara cuando haga login con sus redes sociales o suba una foto el lciente para el registro, esta debe ser una ruta absoluta como https://www.facebook.com/user1/photo.jpg .
</p>
<p>
<b><code>imei_celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imei_celular" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Se registrara el imei del celular del cliente para el registro.
</p>

</form>


## CLIENTE - Registro de nuevo Cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombres": "Jose Rodrigo",
    "apellidos": "Cespedes Rojas",
    "tipo_documento": "Ci,Pasaporte",
    "num_documento": "657848455",
    "celular": "65582210",
    "direccion": "Av Potosi",
    "ciudad": "La Paz",
    "pais": "Bolivia",
    "oficio": "Ing Civil",
    "empresa": "YPFB",
    "telefono": "4652588",
    "email": "cliente@gmail.com",
    "password": "cliente54782",
    "fecha_nacimiento": "1985-03-22",
    "motivo_viaje": "Recreacion,Negocios,Salud,Otro",
    "foto": "foto.jpg",
    "imei_celular": "354651100023680"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-signup" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-signup"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-signup"></code></pre>
</div>
<div id="execution-error-POSTapi-signup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-signup"></code></pre>
</div>
<form id="form-POSTapi-signup" data-method="POST" data-path="api/signup" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-signup', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-signup" onclick="tryItOut('POSTapi-signup');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-signup" onclick="cancelTryOut('POSTapi-signup');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-signup" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/signup</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombres</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nombres" data-endpoint="POSTapi-signup" data-component="body" required  hidden>
<br>
Los nombes del cliente para el registro.
</p>
<p>
<b><code>apellidos</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="apellidos" data-endpoint="POSTapi-signup" data-component="body" required  hidden>
<br>
Los apellidos del cliente para el registro.
</p>
<p>
<b><code>tipo_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tipo_documento" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
El tipo de documento que tiene el cliente para el registro .
</p>
<p>
<b><code>num_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="num_documento" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Número de documento del cliente para el registro.
</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="celular" data-endpoint="POSTapi-signup" data-component="body" required  hidden>
<br>
Número de celular del cliente para el registro.
</p>
<p>
<b><code>direccion</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="direccion" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Direccón del cliente para el registro.
</p>
<p>
<b><code>ciudad</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ciudad" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
La ciudad donde vive el cliente para el registro.
</p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pais" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
País donde vive el cliente para el registro.
</p>
<p>
<b><code>oficio</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="oficio" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
El trabajo que realiza el cliente para el registro.
</p>
<p>
<b><code>empresa</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="empresa" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
La empresa donde trabaja actualemnte el cliente para el registro.
</p>
<p>
<b><code>telefono</code></b>&nbsp;&nbsp;<small>Número</small>     <i>optional</i> &nbsp;
<input type="text" name="telefono" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
de telefono fijo del cliente para el registro.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-signup" data-component="body" required  hidden>
<br>
Email que usa el cliente para el registro.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-signup" data-component="body" required  hidden>
<br>
La clave que usara para ingresar al sistema el cliente para el registro.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Fecha de nacimiento del cliente para el registro.
</p>
<p>
<b><code>motivo_viaje</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="motivo_viaje" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Motivo por el cual viaja el cliente para el registro.
</p>
<p>
<b><code>foto</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="foto" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Foto que se registrara cuando haga login con sus redes sociales o suba una foto el lciente para el registro.
</p>
<p>
<b><code>imei_celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imei_celular" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Se registrara el imei del celular del cliente para el registro.
</p>

</form>


## CLIENTE -  Perfil de Cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/perfil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "cliente_id": 7
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-perfil" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-perfil"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-perfil"></code></pre>
</div>
<div id="execution-error-POSTapi-perfil" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-perfil"></code></pre>
</div>
<form id="form-POSTapi-perfil" data-method="POST" data-path="api/perfil" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-perfil', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-perfil" onclick="tryItOut('POSTapi-perfil');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-perfil" onclick="cancelTryOut('POSTapi-perfil');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-perfil" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/perfil</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-perfil" data-component="body" required  hidden>
<br>
Id del cliente para mostrar el detalle de su perfil.
</p>

</form>


## CLIENTE -  Editar perfil Cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombres": "Jose Rodrigo",
    "apellidos": "Cespedes Rojas",
    "tipo_documento": "Ci,Pasaporte",
    "num_documento": "657848455",
    "celular": "65582210",
    "direccion": "Av Potosi",
    "ciudad": "La Paz",
    "pais": "Bolivia",
    "oficio": "Ing Civil",
    "empresa": "YPFB",
    "telefono": "4652588",
    "email": "cliente@gmail.com",
    "password": "cliente54782",
    "fecha_nacimiento": "1985-03-22",
    "motivo_viaje": "Recreacion,Negocios,Salud,Otro",
    "foto": "foto.jpg",
    "imei_celular": "354651100023680"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-update" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-update"></code></pre>
</div>
<div id="execution-error-POSTapi-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-update"></code></pre>
</div>
<form id="form-POSTapi-update" data-method="POST" data-path="api/update" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-update" onclick="tryItOut('POSTapi-update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-update" onclick="cancelTryOut('POSTapi-update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/update</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombres</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nombres" data-endpoint="POSTapi-update" data-component="body" required  hidden>
<br>
Los nombes del cliente para el registro.
</p>
<p>
<b><code>apellidos</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="apellidos" data-endpoint="POSTapi-update" data-component="body" required  hidden>
<br>
Los apellidos del cliente para el registro.
</p>
<p>
<b><code>tipo_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tipo_documento" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
El tipo de documento que tiene el cliente para el registro .
</p>
<p>
<b><code>num_documento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="num_documento" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Número de documento del cliente para el registro.
</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="celular" data-endpoint="POSTapi-update" data-component="body" required  hidden>
<br>
Número de celular del cliente para el registro.
</p>
<p>
<b><code>direccion</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="direccion" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Direccón del cliente para el registro.
</p>
<p>
<b><code>ciudad</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ciudad" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
La ciudad donde vive el cliente para el registro.
</p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pais" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
País donde vive el cliente para el registro.
</p>
<p>
<b><code>oficio</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="oficio" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
El trabajo que realiza el cliente para el registro.
</p>
<p>
<b><code>empresa</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="empresa" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
La empresa donde trabaja actualemnte el cliente para el registro.
</p>
<p>
<b><code>telefono</code></b>&nbsp;&nbsp;<small>Número</small>     <i>optional</i> &nbsp;
<input type="text" name="telefono" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
de telefono fijo del cliente para el registro.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Email que usa el cliente para el registro.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
La clave que usara para ingresar al sistema el cliente para el registro.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Fecha de nacimiento del cliente para el registro.
</p>
<p>
<b><code>motivo_viaje</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="motivo_viaje" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Motivo por el cual viaja el cliente para el registro.
</p>
<p>
<b><code>foto</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="foto" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Foto que se registrara cuando haga login con sus redes sociales o suba una foto el lciente para el registro.
</p>
<p>
<b><code>imei_celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imei_celular" data-endpoint="POSTapi-update" data-component="body"  hidden>
<br>
Se registrara el imei del celular del cliente para el registro.
</p>

</form>


## CLIENTE -  Verificacion de email para cambio de password




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/verificaremail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "cliente@gmail.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-verificaremail" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-verificaremail"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-verificaremail"></code></pre>
</div>
<div id="execution-error-POSTapi-verificaremail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-verificaremail"></code></pre>
</div>
<form id="form-POSTapi-verificaremail" data-method="POST" data-path="api/verificaremail" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-verificaremail', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-verificaremail" onclick="tryItOut('POSTapi-verificaremail');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-verificaremail" onclick="cancelTryOut('POSTapi-verificaremail');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-verificaremail" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/verificaremail</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-verificaremail" data-component="body" required  hidden>
<br>
Verificacion que existe el email enviado.
</p>

</form>


## CLIENTE -  Verificacion de codigo enviado al email del cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/verificarcodigo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "codigo": "58741258",
    "cliente_id": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 7,
    "nombres": "Juan Carlos",
    "apellidos": "Espinoza Cespedes",
    "tipo_documento": "Ci",
    "num_documento": "94564455",
    "celular": "65582210",
    "direccion": "Av Pando",
    "ciudad": "Cochabamba",
    "pais": "Bolivia",
    "oficio": "Arquitecto",
    "empresa": "SOFT",
    "telefono": "4444444",
    "email": "juan@gmail.com",
    "fecha_nacimiento": "1989-05-12",
    "motivo_viaje": "Recreacion",
    "foto": "foto.jpg",
    "api_token": "KjUdFmnlAu7aFjlUXWIuSE1L4wPM8y3oWFacDALHOHKbNlbZGIa6ifz6Ojy4",
    "imei_celular": "354651100023680"
}
```
<div id="execution-results-POSTapi-verificarcodigo" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-verificarcodigo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-verificarcodigo"></code></pre>
</div>
<div id="execution-error-POSTapi-verificarcodigo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-verificarcodigo"></code></pre>
</div>
<form id="form-POSTapi-verificarcodigo" data-method="POST" data-path="api/verificarcodigo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-verificarcodigo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-verificarcodigo" onclick="tryItOut('POSTapi-verificarcodigo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-verificarcodigo" onclick="cancelTryOut('POSTapi-verificarcodigo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-verificarcodigo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/verificarcodigo</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>codigo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="codigo" data-endpoint="POSTapi-verificarcodigo" data-component="body" required  hidden>
<br>
Verificacion que el codigo que se envio a su email coincidan.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-verificarcodigo" data-component="body" required  hidden>
<br>
Id del cliente para devolver su informacion.
</p>

</form>


## CLIENTE - Cambio de password del Cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/cambiarpassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 5,
    "password": "cliente12578",
    "retypepassword": "cliente12578"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

{
  "data": Se cambio la contraseña,
}
```
<div id="execution-results-POSTapi-cambiarpassword" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-cambiarpassword"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cambiarpassword"></code></pre>
</div>
<div id="execution-error-POSTapi-cambiarpassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cambiarpassword"></code></pre>
</div>
<form id="form-POSTapi-cambiarpassword" data-method="POST" data-path="api/cambiarpassword" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-cambiarpassword', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-cambiarpassword" onclick="tryItOut('POSTapi-cambiarpassword');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-cambiarpassword" onclick="cancelTryOut('POSTapi-cambiarpassword');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-cambiarpassword" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/cambiarpassword</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-cambiarpassword" data-component="body" required  hidden>
<br>
Id del cliente a restablecer la contraseña.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-cambiarpassword" data-component="body" required  hidden>
<br>
Password por el cual restablecera.
</p>
<p>
<b><code>retypepassword</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="retypepassword" data-endpoint="POSTapi-cambiarpassword" data-component="body" required  hidden>
<br>
Verificacion de que escribio bien la contraseña.
</p>

</form>


## SLIDERS - Listado de la Galeria del Hotel




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/sliders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 1,
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/hotel\/galeria\/foto_210514173512.jpg",
    "descripcion": "<p>sadsafasfa<\/p>"
}
```
<div id="execution-results-GETapi-sliders" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sliders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sliders"></code></pre>
</div>
<div id="execution-error-GETapi-sliders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sliders"></code></pre>
</div>
<form id="form-GETapi-sliders" data-method="GET" data-path="api/sliders" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sliders', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-sliders" onclick="tryItOut('GETapi-sliders');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-sliders" onclick="cancelTryOut('GETapi-sliders');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-sliders" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/sliders</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-sliders" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## HABITACIONES - Listado de las categorias de las habitaciones




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/habitacioncategorias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 4,
    "nombre": "Habitacion Presidencial",
    "descripcion": "<p>sadsafasfa<\/p>",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/categorias\/habitacioncategoria_210422124342.jpg"
}
```
<div id="execution-results-GETapi-habitacioncategorias" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-habitacioncategorias"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-habitacioncategorias"></code></pre>
</div>
<div id="execution-error-GETapi-habitacioncategorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-habitacioncategorias"></code></pre>
</div>
<form id="form-GETapi-habitacioncategorias" data-method="GET" data-path="api/habitacioncategorias" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-habitacioncategorias', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-habitacioncategorias" onclick="tryItOut('GETapi-habitacioncategorias');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-habitacioncategorias" onclick="cancelTryOut('GETapi-habitacioncategorias');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-habitacioncategorias" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/habitacioncategorias</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-habitacioncategorias" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## HABITACIONES - Listado de habitaciones segun la categoria que estan enlazadas




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/habitaciones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "categoria_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Habitacion 1",
    "descripcion": "<p>asdafasfasfasfafafas<\/p>",
    "num_habitacion": 1,
    "precio": "850.00",
    "precio_promocion": "550.00",
    "capacidad_minima": "3",
    "capacidad_maxima": "7",
    "estado": "Disponible",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/habitacion_210516222401.jfif"
}
```
<div id="execution-results-POSTapi-habitaciones" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-habitaciones"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-habitaciones"></code></pre>
</div>
<div id="execution-error-POSTapi-habitaciones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-habitaciones"></code></pre>
</div>
<form id="form-POSTapi-habitaciones" data-method="POST" data-path="api/habitaciones" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-habitaciones', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-habitaciones" onclick="tryItOut('POSTapi-habitaciones');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-habitaciones" onclick="cancelTryOut('POSTapi-habitaciones');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-habitaciones" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/habitaciones</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-habitaciones" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>categoria_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="categoria_id" data-endpoint="POSTapi-habitaciones" data-component="body" required  hidden>
<br>
Id de la categoria de la habitacion.
</p>

</form>


## HABITACIONES - Detalle de la habitacion




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/habitaciondetalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "habitacion_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "asfasfasgfsagasga",
    "descripcion": "<p>asasfasfa<\/p>",
    "num_habitacion": 100,
    "precio": "250.00",
    "precio_promocion": "0.00",
    "capacidad_minima": "6",
    "capacidad_maxima": "8",
    "estado": "Reservado",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/habitacion_210430121313.jpg"
}
```
<div id="execution-results-POSTapi-habitaciondetalle" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-habitaciondetalle"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-habitaciondetalle"></code></pre>
</div>
<div id="execution-error-POSTapi-habitaciondetalle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-habitaciondetalle"></code></pre>
</div>
<form id="form-POSTapi-habitaciondetalle" data-method="POST" data-path="api/habitaciondetalle" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-habitaciondetalle', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-habitaciondetalle" onclick="tryItOut('POSTapi-habitaciondetalle');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-habitaciondetalle" onclick="cancelTryOut('POSTapi-habitaciondetalle');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-habitaciondetalle" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/habitaciondetalle</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-habitaciondetalle" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>habitacion_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="habitacion_id" data-endpoint="POSTapi-habitaciondetalle" data-component="body" required  hidden>
<br>
Id de la habitacion para ver su detalle.
</p>

</form>


## HABITACIONES - Listado de habitaciones a la categoria que pertenece




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/Habitacionescategoria"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Habitacion 1",
    "descripcion": "<p>asdafasfasfasfafafas<\/p>",
    "num_habitacion": 1,
    "precio": "850.00",
    "precio_promocion": "550.00",
    "capacidad_minima": "3",
    "capacidad_maxima": "7",
    "estado": "Disponible",
    "categoria": "Habitacion Presidencial",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/habitacion_210516222401.jfif"
}
```
<div id="execution-results-GETapi-Habitacionescategoria" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-Habitacionescategoria"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-Habitacionescategoria"></code></pre>
</div>
<div id="execution-error-GETapi-Habitacionescategoria" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-Habitacionescategoria"></code></pre>
</div>
<form id="form-GETapi-Habitacionescategoria" data-method="GET" data-path="api/Habitacionescategoria" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-Habitacionescategoria', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-Habitacionescategoria" onclick="tryItOut('GETapi-Habitacionescategoria');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-Habitacionescategoria" onclick="cancelTryOut('GETapi-Habitacionescategoria');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-Habitacionescategoria" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/Habitacionescategoria</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-Habitacionescategoria" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## PROMOCION - Listado de promociones de las habitaciones




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/promociones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "asdasfasfasfa",
    "descripcion": "<p>asfasfasfasfsafa<\/p>",
    "precio": "150.00",
    "estado": "Activo",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/promociones\/promocion_210513161554.jpg"
}
```
<div id="execution-results-GETapi-promociones" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-promociones"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-promociones"></code></pre>
</div>
<div id="execution-error-GETapi-promociones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-promociones"></code></pre>
</div>
<form id="form-GETapi-promociones" data-method="GET" data-path="api/promociones" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-promociones', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-promociones" onclick="tryItOut('GETapi-promociones');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-promociones" onclick="cancelTryOut('GETapi-promociones');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-promociones" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/promociones</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-promociones" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## TRANSPORTES - Listado de transportes




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/transportes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Taxis corona",
    "descripcion": "<p>adasdasdasd<\/p>",
    "precio": "25.00"
}
```
<div id="execution-results-GETapi-transportes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-transportes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transportes"></code></pre>
</div>
<div id="execution-error-GETapi-transportes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transportes"></code></pre>
</div>
<form id="form-GETapi-transportes" data-method="GET" data-path="api/transportes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-transportes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-transportes" onclick="tryItOut('GETapi-transportes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-transportes" onclick="cancelTryOut('GETapi-transportes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-transportes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/transportes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-transportes" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## TRANSPORTES - Detalle de transporte




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/transportedetalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "transporte_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Taxis corona",
    "descripcion": "<p>adasdasdasd<\/p>",
    "precio": "25.00",
    "foto": "foto.jpg"
}
```
<div id="execution-results-POSTapi-transportedetalle" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-transportedetalle"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transportedetalle"></code></pre>
</div>
<div id="execution-error-POSTapi-transportedetalle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transportedetalle"></code></pre>
</div>
<form id="form-POSTapi-transportedetalle" data-method="POST" data-path="api/transportedetalle" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-transportedetalle', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-transportedetalle" onclick="tryItOut('POSTapi-transportedetalle');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-transportedetalle" onclick="cancelTryOut('POSTapi-transportedetalle');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-transportedetalle" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/transportedetalle</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-transportedetalle" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>transporte_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="transporte_id" data-endpoint="POSTapi-transportedetalle" data-component="body" required  hidden>
<br>
Id del transporte para ver su detalle.
</p>

</form>


## EVENTOS - Listado de eventos




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/eventos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "sadaasfasa",
    "descripcion": "<p>asfasfasfas<\/p>",
    "fecha": "2021-04-24",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/eventos\/evento_210422123859.jpg"
}
```
<div id="execution-results-GETapi-eventos" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-eventos"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-eventos"></code></pre>
</div>
<div id="execution-error-GETapi-eventos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-eventos"></code></pre>
</div>
<form id="form-GETapi-eventos" data-method="GET" data-path="api/eventos" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-eventos', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-eventos" onclick="tryItOut('GETapi-eventos');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-eventos" onclick="cancelTryOut('GETapi-eventos');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-eventos" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/eventos</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-eventos" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## TURISTICOS - Listado de Lugares Turisticos Gastronomicos




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/lugaresgastronomia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pairumani",
    "descripcion": "<p>Recorrido por todo el parque<\/p>",
    "precio_recorrido": "500.00",
    "lat": "-17.38918918180772",
    "lng": "-66.15840481762962",
    "tipo": "Gastronomia",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
}
```
<div id="execution-results-GETapi-lugaresgastronomia" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-lugaresgastronomia"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-lugaresgastronomia"></code></pre>
</div>
<div id="execution-error-GETapi-lugaresgastronomia" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-lugaresgastronomia"></code></pre>
</div>
<form id="form-GETapi-lugaresgastronomia" data-method="GET" data-path="api/lugaresgastronomia" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-lugaresgastronomia', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-lugaresgastronomia" onclick="tryItOut('GETapi-lugaresgastronomia');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-lugaresgastronomia" onclick="cancelTryOut('GETapi-lugaresgastronomia');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-lugaresgastronomia" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/lugaresgastronomia</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-lugaresgastronomia" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## TURISTICOS - Listado de Lugares Turisticos Turismo




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/lugaresturismo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pairumani",
    "descripcion": "<p>Recorrido por todo el parque<\/p>",
    "precio_recorrido": "500.00",
    "lat": "-17.38918918180772",
    "lng": "-66.15840481762962",
    "tipo": "Turismo",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
}
```
<div id="execution-results-GETapi-lugaresturismo" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-lugaresturismo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-lugaresturismo"></code></pre>
</div>
<div id="execution-error-GETapi-lugaresturismo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-lugaresturismo"></code></pre>
</div>
<form id="form-GETapi-lugaresturismo" data-method="GET" data-path="api/lugaresturismo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-lugaresturismo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-lugaresturismo" onclick="tryItOut('GETapi-lugaresturismo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-lugaresturismo" onclick="cancelTryOut('GETapi-lugaresturismo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-lugaresturismo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/lugaresturismo</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-lugaresturismo" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## TURISTICOS - Detalle Lugar Turistico




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/turismodetalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "turismo_id": 2
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Plaza Principal",
    "descripcion": "<p>asdafafafmans,mfna,s<\/p>",
    "precio_recorrido": "250.00",
    "lat": "-17.39375549279761",
    "lng": "-66.15695642476157",
    "tipo": "Turismo",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210513145930.jpg"
}
```
<div id="execution-results-POSTapi-turismodetalle" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-turismodetalle"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-turismodetalle"></code></pre>
</div>
<div id="execution-error-POSTapi-turismodetalle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-turismodetalle"></code></pre>
</div>
<form id="form-POSTapi-turismodetalle" data-method="POST" data-path="api/turismodetalle" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-turismodetalle', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-turismodetalle" onclick="tryItOut('POSTapi-turismodetalle');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-turismodetalle" onclick="cancelTryOut('POSTapi-turismodetalle');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-turismodetalle" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/turismodetalle</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-turismodetalle" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>turismo_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="turismo_id" data-endpoint="POSTapi-turismodetalle" data-component="body"  hidden>
<br>
Id del lugar turistico.
</p>

</form>


## RESTAURANTE - Listado de Categorias Restaurante




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/restaurantecategorias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "adasdasfasf",
    "descripcion": "<p>safasfasfasfa<\/p>",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/restaurantes\/categorias\/restaurantecategoria_210422153310.jpg"
}
```
<div id="execution-results-GETapi-restaurantecategorias" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-restaurantecategorias"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-restaurantecategorias"></code></pre>
</div>
<div id="execution-error-GETapi-restaurantecategorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-restaurantecategorias"></code></pre>
</div>
<form id="form-GETapi-restaurantecategorias" data-method="GET" data-path="api/restaurantecategorias" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-restaurantecategorias', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-restaurantecategorias" onclick="tryItOut('GETapi-restaurantecategorias');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-restaurantecategorias" onclick="cancelTryOut('GETapi-restaurantecategorias');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-restaurantecategorias" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/restaurantecategorias</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-restaurantecategorias" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## RESTAURANTE - Listado de Productos Restaurante segun a la Categoria que pertenecen




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/restauranteproductos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "categoria_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pique macho",
    "descripcion": "<p>afasfasfasfasfasf<\/p>",
    "precio": "100.00",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/restaurantes\/productos\/producto_210423115837.jpg"
}
```
<div id="execution-results-POSTapi-restauranteproductos" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-restauranteproductos"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-restauranteproductos"></code></pre>
</div>
<div id="execution-error-POSTapi-restauranteproductos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-restauranteproductos"></code></pre>
</div>
<form id="form-POSTapi-restauranteproductos" data-method="POST" data-path="api/restauranteproductos" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-restauranteproductos', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-restauranteproductos" onclick="tryItOut('POSTapi-restauranteproductos');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-restauranteproductos" onclick="cancelTryOut('POSTapi-restauranteproductos');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-restauranteproductos" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/restauranteproductos</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-restauranteproductos" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>categoria_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="categoria_id" data-endpoint="POSTapi-restauranteproductos" data-component="body" required  hidden>
<br>
Id de la categoria del producto.
</p>

</form>


## RESTAURANTE - Deatelle Producto Restaurante




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/productodetalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "producto_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pique macho",
    "descripcion": "<p>afasfasfasfasfasf<\/p>",
    "precio": "100.00",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/restaurantes\/productos\/producto_210423115837.jpg"
}
```
<div id="execution-results-POSTapi-productodetalle" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-productodetalle"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-productodetalle"></code></pre>
</div>
<div id="execution-error-POSTapi-productodetalle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-productodetalle"></code></pre>
</div>
<form id="form-POSTapi-productodetalle" data-method="POST" data-path="api/productodetalle" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-productodetalle', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-productodetalle" onclick="tryItOut('POSTapi-productodetalle');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-productodetalle" onclick="cancelTryOut('POSTapi-productodetalle');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-productodetalle" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/productodetalle</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-productodetalle" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>producto_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="producto_id" data-endpoint="POSTapi-productodetalle" data-component="body" required  hidden>
<br>
Id del producto.
</p>

</form>


## CAFETERIA - Listado de Categorias Cafeteria




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/cafeteriacategorias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "adasdasfasf",
    "descripcion": "<p>safasfasfasfa<\/p>",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/cafeteria\/categorias\/cafeteriacategoria_210422153310.jpg"
}
```
<div id="execution-results-GETapi-cafeteriacategorias" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-cafeteriacategorias"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cafeteriacategorias"></code></pre>
</div>
<div id="execution-error-GETapi-cafeteriacategorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cafeteriacategorias"></code></pre>
</div>
<form id="form-GETapi-cafeteriacategorias" data-method="GET" data-path="api/cafeteriacategorias" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-cafeteriacategorias', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-cafeteriacategorias" onclick="tryItOut('GETapi-cafeteriacategorias');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-cafeteriacategorias" onclick="cancelTryOut('GETapi-cafeteriacategorias');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-cafeteriacategorias" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/cafeteriacategorias</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="GETapi-cafeteriacategorias" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>

</form>


## CAFETERIA - Listado de Productos Cafeteria segun a la Categoria que pertenecen




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/cafeteriaproductos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "categoria_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pique macho",
    "descripcion": "<p>afasfasfasfasfasf<\/p>",
    "precio": "100.00",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/cafeteria\/productos\/producto_210423115837.jpg"
}
```
<div id="execution-results-POSTapi-cafeteriaproductos" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-cafeteriaproductos"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cafeteriaproductos"></code></pre>
</div>
<div id="execution-error-POSTapi-cafeteriaproductos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cafeteriaproductos"></code></pre>
</div>
<form id="form-POSTapi-cafeteriaproductos" data-method="POST" data-path="api/cafeteriaproductos" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-cafeteriaproductos', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-cafeteriaproductos" onclick="tryItOut('POSTapi-cafeteriaproductos');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-cafeteriaproductos" onclick="cancelTryOut('POSTapi-cafeteriaproductos');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-cafeteriaproductos" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/cafeteriaproductos</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-cafeteriaproductos" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>categoria_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="categoria_id" data-endpoint="POSTapi-cafeteriaproductos" data-component="body" required  hidden>
<br>
Id de la categoria del producto.
</p>

</form>


## CAFETERIA - Deatelle Producto Cafeteria




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/cafeteriaproductodetalle"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "producto_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "nombre": "Pique macho",
    "descripcion": "<p>afasfasfasfasfasf<\/p>",
    "precio": "100.00",
    "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/cafeteria\/productos\/producto_210423115837.jpg"
}
```
<div id="execution-results-POSTapi-cafeteriaproductodetalle" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-cafeteriaproductodetalle"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cafeteriaproductodetalle"></code></pre>
</div>
<div id="execution-error-POSTapi-cafeteriaproductodetalle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cafeteriaproductodetalle"></code></pre>
</div>
<form id="form-POSTapi-cafeteriaproductodetalle" data-method="POST" data-path="api/cafeteriaproductodetalle" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-cafeteriaproductodetalle', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-cafeteriaproductodetalle" onclick="tryItOut('POSTapi-cafeteriaproductodetalle');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-cafeteriaproductodetalle" onclick="cancelTryOut('POSTapi-cafeteriaproductodetalle');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-cafeteriaproductodetalle" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/cafeteriaproductodetalle</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-cafeteriaproductodetalle" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>producto_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="producto_id" data-endpoint="POSTapi-cafeteriaproductodetalle" data-component="body" required  hidden>
<br>
Id del producto.
</p>

</form>


## RESERVAS - Nueva reserva.


Creacion de la Reserva de una Habitacion

> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/reservahabitacion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "checkin": "2021-05-17",
    "checkout": "2021-05-19",
    "adultos": 3,
    "ninos": 2,
    "cliente_id": 1,
    "habitacion_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "checkin": "2021-05-14",
    "checkout": "2021-05-16",
    "adultos": "3",
    "niños": "2",
    "cliente_id": 7,
    "habitacion_id": 8,
    "id": 8
}
```
<div id="execution-results-POSTapi-reservahabitacion" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservahabitacion"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservahabitacion"></code></pre>
</div>
<div id="execution-error-POSTapi-reservahabitacion" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservahabitacion"></code></pre>
</div>
<form id="form-POSTapi-reservahabitacion" data-method="POST" data-path="api/reservahabitacion" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservahabitacion', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservahabitacion" onclick="tryItOut('POSTapi-reservahabitacion');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservahabitacion" onclick="cancelTryOut('POSTapi-reservahabitacion');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservahabitacion" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservahabitacion</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>checkin</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="checkin" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Fecha checkin.
</p>
<p>
<b><code>checkout</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="checkout" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Fecha checkout.
</p>
<p>
<b><code>adultos</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="adultos" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Canridad de adultos en la habitacion.
</p>
<p>
<b><code>ninos</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="ninos" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Cantidad de niños en la habitacion.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Id del cliente a reservar.
</p>
<p>
<b><code>habitacion_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="habitacion_id" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
<br>
Id de la habitacion.
</p>

</form>


## RESERVAS - Mis reservas.


Muestra la lsita de las reservas del cliente

> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/misreservas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "cliente_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 5,
    "checkin": "2021-05-06",
    "checkout": "2021-05-08",
    "adultos": 3,
    "niños": 2,
    "cliente": {
        "nombre": "Paola Montecinos Pardo",
        "celular": "8888888",
        "telefono": "9999999",
        "ciudad": "Cochabamba",
        "pais": "Bolivia",
        "oficio": "Arquitecto",
        "email": "paola@gmail.com"
    },
    "habitacion": {
        "nombre": "Habitacion 20",
        "num_habitacion": "20",
        "precio": "450.00",
        "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/habitacion_210506153104.jfif"
    }
}
```
<div id="execution-results-POSTapi-misreservas" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-misreservas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-misreservas"></code></pre>
</div>
<div id="execution-error-POSTapi-misreservas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-misreservas"></code></pre>
</div>
<form id="form-POSTapi-misreservas" data-method="POST" data-path="api/misreservas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-misreservas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-misreservas" onclick="tryItOut('POSTapi-misreservas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-misreservas" onclick="cancelTryOut('POSTapi-misreservas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-misreservas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/misreservas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-misreservas" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-misreservas" data-component="body" required  hidden>
<br>
Id del cliente.
</p>

</form>


## HOSPEDAJES - Hospedajes Cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/mishospedajes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "cliente_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "id": 13,
    "checkin": "2021-05-20",
    "checkout": "2021-05-22",
    "adultos": 4,
    "niños": 2,
    "precio": "300.00",
    "estado": "Ocupado",
    "cliente": {
        "nombre": "Julian Gonzales Llanos",
        "celular": "62101485",
        "telefono": "42682265",
        "ciudad": "La Paz",
        "pais": "Bolivia",
        "oficio": "Albañil",
        "email": "julian@gmail.com"
    },
    "habitacion": {
        "nombre": "Habitacion 26",
        "num_habitacion": "26",
        "precio": "450.00",
        "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/habitaciones\/habitacion_210521090607.jfif"
    },
    "transportes": [],
    "lugares": [
        {
            "nombre": "Pairumani",
            "precio": "500.00",
            "fecha": "2021-06-04",
            "tipo": "Gastronomia",
            "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
        },
        {
            "nombre": "Pairumani",
            "precio": "500.00",
            "fecha": "2021-06-11",
            "tipo": "Gastronomia",
            "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
        },
        {
            "nombre": "Pairumani",
            "precio": "500.00",
            "fecha": "2021-06-10",
            "tipo": "Gastronomia",
            "foto": "http:\/\/pairumanibackoffice.test\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
        }
    ],
    "restaurante": [
        {
            "fecha": "2021-06-09",
            "hora": "17:35:40",
            "productos": [
                {
                    "producto": "Pique macho",
                    "precio_producto": "100.00",
                    "opcion": "Papas fritas",
                    "tamaño": {
                        "nombre": "Pequeño",
                        "precio_tamaño": "40.00"
                    }
                }
            ]
        },
        {
            "fecha": "2021-06-09",
            "hora": "18:40:48",
            "productos": [
                {
                    "producto": "Pique macho",
                    "precio_producto": "100.00",
                    "opcion": "Papas fritas",
                    "tamaño": {
                        "nombre": "Pequeño",
                        "precio_tamaño": "40.00"
                    }
                }
            ]
        }
    ],
    "totales": {
        "hospedaje": "300.00",
        "transportes": "0.00",
        "restaurante": "980.00",
        "lugarturistico": "1,500.00",
        "totalpagar": "2,780.00"
    }
}
```
<div id="execution-results-POSTapi-mishospedajes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mishospedajes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mishospedajes"></code></pre>
</div>
<div id="execution-error-POSTapi-mishospedajes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mishospedajes"></code></pre>
</div>
<form id="form-POSTapi-mishospedajes" data-method="POST" data-path="api/mishospedajes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mishospedajes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mishospedajes" onclick="tryItOut('POSTapi-mishospedajes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mishospedajes" onclick="cancelTryOut('POSTapi-mishospedajes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mishospedajes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mishospedajes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-mishospedajes" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-mishospedajes" data-component="body" required  hidden>
<br>
Id del cliente.
</p>

</form>


## HOSPEDAJES - Hospedajes ocupados del cliente




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/mishospedajesocupados"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "cliente_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

{
      'id' => 39,
      "checkin": "2021-05-20",
      "checkout": "2021-05-22",
      "adultos": 4,
      "niños": 2,
      "precio": "300.00",
      "estado": "Ocupado",
      "cliente": {
          "nombre": "Julian Gonzales Llanos",
          "celular": "62101485",
          "telefono": "42682265",
          "ciudad": "La Paz",
          "pais": "Bolivia",
          "oficio": "Albañil",
          "email": "julian@gmail.com"
      },
      "habitacion": {
          "nombre": "Habitacion 26",
          "num_habitacion": "26",
          "precio": "450.00",
          "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210521090607.jfif"
      },
}
```
<div id="execution-results-POSTapi-mishospedajesocupados" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mishospedajesocupados"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mishospedajesocupados"></code></pre>
</div>
<div id="execution-error-POSTapi-mishospedajesocupados" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mishospedajesocupados"></code></pre>
</div>
<form id="form-POSTapi-mishospedajesocupados" data-method="POST" data-path="api/mishospedajesocupados" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mishospedajesocupados', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mishospedajesocupados" onclick="tryItOut('POSTapi-mishospedajesocupados');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mishospedajesocupados" onclick="cancelTryOut('POSTapi-mishospedajesocupados');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mishospedajesocupados" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mishospedajesocupados</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-mishospedajesocupados" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-mishospedajesocupados" data-component="body" required  hidden>
<br>
Id del cliente.
</p>

</form>


## TRANSPORTES - Reserva transportes




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/reservatransporte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearer_token": "drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z",
    "datos": "{\n      \"datos\":[\n               {\n\t              \"transporte_id\":\"2\",\n\t              \"precio\":\"25\",\n                   \"hospedaje_id\":\"13\"\n               },\n               {\n\t               \"transporte_id\":\"2\",\n\t               \"precio\":\"25\",\n                    \"hospedaje_id\":\"13\"\n                }\n              ]\n           }"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-reservatransporte" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservatransporte"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservatransporte"></code></pre>
</div>
<div id="execution-error-POSTapi-reservatransporte" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservatransporte"></code></pre>
</div>
<form id="form-POSTapi-reservatransporte" data-method="POST" data-path="api/reservatransporte" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservatransporte', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservatransporte" onclick="tryItOut('POSTapi-reservatransporte');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservatransporte" onclick="cancelTryOut('POSTapi-reservatransporte');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservatransporte" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservatransporte</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearer_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearer_token" data-endpoint="POSTapi-reservatransporte" data-component="body" required  hidden>
<br>
Campo unico del cliente autenticado para acceder a esta ruta.
</p>
<p>
<b><code>datos</code></b>&nbsp;&nbsp;<small>array</small>     <i>optional</i> &nbsp;
<input type="text" name="datos" data-endpoint="POSTapi-reservatransporte" data-component="body"  hidden>
<br>
datos transporte.
</p>

</form>


## TURISTICOS - Reservas Lugar Turistico




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/reservalugarturistico"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "cliente_id": 5,
    "lugar_turistico_id": 1,
    "fecha": "2021-06-10",
    "hospedaje_id": 10,
    "precio": 500
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "success": "true",
    "data": "Lugar Turistico reservado"
}
```
<div id="execution-results-POSTapi-reservalugarturistico" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservalugarturistico"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservalugarturistico"></code></pre>
</div>
<div id="execution-error-POSTapi-reservalugarturistico" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservalugarturistico"></code></pre>
</div>
<form id="form-POSTapi-reservalugarturistico" data-method="POST" data-path="api/reservalugarturistico" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservalugarturistico', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservalugarturistico" onclick="tryItOut('POSTapi-reservalugarturistico');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservalugarturistico" onclick="cancelTryOut('POSTapi-reservalugarturistico');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservalugarturistico" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservalugarturistico</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-reservalugarturistico" data-component="body" required  hidden>
<br>
Id del cliente.
</p>
<p>
<b><code>lugar_turistico_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="lugar_turistico_id" data-endpoint="POSTapi-reservalugarturistico" data-component="body" required  hidden>
<br>
Id del lugar turistico.
</p>
<p>
<b><code>fecha</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="fecha" data-endpoint="POSTapi-reservalugarturistico" data-component="body" required  hidden>
<br>
Fecha de registro reserva .
</p>
<p>
<b><code>hospedaje_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospedaje_id" data-endpoint="POSTapi-reservalugarturistico" data-component="body" required  hidden>
<br>
Id del hospedaje.
</p>
<p>
<b><code>precio</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="precio" data-endpoint="POSTapi-reservalugarturistico" data-component="body" required  hidden>
<br>
Precio del recorrido Lugar Turistico.
</p>

</form>


## RESTAURANTE - Reservas Restaurante




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/reservarestaurante"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "hospedaje_id": 10,
    "cliente_id": 10,
    "total": 600,
    "datos": "{\n     \"hospedaje_id\":\"10\",\n     \"total\":\"600\",\n     \"datos\":[\n          {\n              \"producto_id\":\"1\",\n              \"cantidad\":\"2\",\n              \"precio\":\"100\",\n              \"opcion_id\":\"2\",\n              \"tamano_id\":\"1\",\n              \"preciotamano\":\"20\"\n          },\n          {\n              \"producto_id\":\"1\",\n              \"cantidad\":\"3\",\n              \"precio\":\"100\",\n              \"opcion_id\":\"2\",\n              \"tamano_id\":\"1\",\n              \"preciotamano\":\"20\"\n          }\n      ]\n  }"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "success": "true",
    "data": "Productos Agregados"
}
```
<div id="execution-results-POSTapi-reservarestaurante" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservarestaurante"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservarestaurante"></code></pre>
</div>
<div id="execution-error-POSTapi-reservarestaurante" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservarestaurante"></code></pre>
</div>
<form id="form-POSTapi-reservarestaurante" data-method="POST" data-path="api/reservarestaurante" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservarestaurante', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservarestaurante" onclick="tryItOut('POSTapi-reservarestaurante');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservarestaurante" onclick="cancelTryOut('POSTapi-reservarestaurante');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservarestaurante" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservarestaurante</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>hospedaje_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospedaje_id" data-endpoint="POSTapi-reservarestaurante" data-component="body" required  hidden>
<br>
Id del hospedaje.
</p>
<p>
<b><code>cliente_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="cliente_id" data-endpoint="POSTapi-reservarestaurante" data-component="body" required  hidden>
<br>
Id del hospedaje.
</p>
<p>
<b><code>total</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="total" data-endpoint="POSTapi-reservarestaurante" data-component="body" required  hidden>
<br>
Total pedidos productos restaurante.
</p>
<p>
<b><code>datos</code></b>&nbsp;&nbsp;<small>array</small>     <i>optional</i> &nbsp;
<input type="text" name="datos" data-endpoint="POSTapi-reservarestaurante" data-component="body"  hidden>
<br>
datos transporte.
</p>

</form>


## CAFETERIA - Reservas cafeteria




> Example request:

```javascript
const url = new URL(
    "http://c2210260.ferozo.com/api/reservacafeteria"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "hospedaje_id": 10,
    "total": 600,
    "producto_id": 1,
    "precio": 100,
    "cantidad": 3,
    "opcion_id": 1,
    "tamano_id": 2,
    "preciotamano": 40,
    "datos": "{\n     \"hospedaje_id\":\"10\",\n     \"total\":\"600\",\n      \"datos\":[\n          {\n              \"producto_id\":\"1\",\n              \"cantidad\":\"2\",\n              \"precio\":\"100\",\n              \"opcion_id\":\"2\",\n              \"tamano_id\":\"1\",\n              \"preciotamano\":\"20\"\n          },\n          {\n              \"producto_id\":\"1\",\n              \"cantidad\":\"3\",\n              \"precio\":\"100\",\n              \"opcion_id\":\"2\",\n              \"tamano_id\":\"1\",\n              \"preciotamano\":\"20\"\n          }\n      ]\n  }"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json
{
    "success": "true",
    "data": "Productos Agregados"
}
```
<div id="execution-results-POSTapi-reservacafeteria" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservacafeteria"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservacafeteria"></code></pre>
</div>
<div id="execution-error-POSTapi-reservacafeteria" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservacafeteria"></code></pre>
</div>
<form id="form-POSTapi-reservacafeteria" data-method="POST" data-path="api/reservacafeteria" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservacafeteria', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservacafeteria" onclick="tryItOut('POSTapi-reservacafeteria');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservacafeteria" onclick="cancelTryOut('POSTapi-reservacafeteria');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservacafeteria" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservacafeteria</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>hospedaje_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospedaje_id" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Id del hospedaje.
</p>
<p>
<b><code>total</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="total" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Total pedidos productos restaurante.
</p>
<p>
<b><code>producto_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="producto_id" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Id del producto reservado .
</p>
<p>
<b><code>precio</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="precio" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Precio del producto.
</p>
<p>
<b><code>cantidad</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="cantidad" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Cantidad de productos reservados.
</p>
<p>
<b><code>opcion_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="opcion_id" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Id de la opcion del producto.
</p>
<p>
<b><code>tamano_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="tamano_id" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Ide del tamaño producto.
</p>
<p>
<b><code>preciotamano</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="preciotamano" data-endpoint="POSTapi-reservacafeteria" data-component="body" required  hidden>
<br>
Precio del tamaño producto.
</p>
<p>
<b><code>datos</code></b>&nbsp;&nbsp;<small>array</small>     <i>optional</i> &nbsp;
<input type="text" name="datos" data-endpoint="POSTapi-reservacafeteria" data-component="body"  hidden>
<br>
datos transporte.
</p>

</form>


