# Endpoints


## Login con redes sociales y normal




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "tipo_login": "1,2,3",
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
<b><code>tipo_login</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="tipo_login" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
El tipo de login que usara el cliente para iniciar sesion.
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
Foto que se registrara cuando haga login con sus redes sociales o suba una foto el lciente para el registro.
</p>
<p>
<b><code>imei_celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imei_celular" data-endpoint="POSTapi-login" data-component="body"  hidden>
<br>
Se registrara el imei del celular del cliente para el registro.
</p>

</form>


## Registro de nuevo Cliente




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/signup"
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
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-signup" data-component="body"  hidden>
<br>
Email que usa el cliente para el registro.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-signup" data-component="body"  hidden>
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


## Perfil de Cliente




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/perfil"
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


## Verificacion de email para cambio de password




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/verificaremail"
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
  "data": true,
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


## Verificacion de codigo enviado al email del cliente




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/verificarcodigo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "codigo": "58741258"
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
  "data": true o false,
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

</form>


## Cambio de password del Cliente




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/cambiarpassword"
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


## Listado de la Galeria del Hotel




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/sliders"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/hotel\/galeria\/foto_210514173512.jpg",
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


## Listado de las categorias de las habitaciones




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/habitacioncategorias"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/habitaciones\/categorias\/habitacioncategoria_210422124342.jpg"
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


## Listado de habitaciones segun la categoria que estan enlazadas




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/habitaciones"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/habitaciones\/habitacion_210516222401.jfif"
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


## Detalle de la habitacion




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/habitaciondetalle"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/habitaciones\/habitacion_210430121313.jpg"
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


## Listado de habitaciones a la categoria que pertenece




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/Habitacionescategoria"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/habitaciones\/habitacion_210516222401.jfif"
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


## Listado de promociones de las habitaciones




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/promociones"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/promociones\/promocion_210513161554.jpg"
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


## Listado de transportes




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/transportes"
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


## Listado de eventos




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/eventos"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/eventos\/evento_210422123859.jpg"
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


## Listado de Lugares Turisticos Gastronomicos




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/lugaresgastronomia"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
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


## Listado de Lugares Turisticos Turismo




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/lugaresturismo"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/lugaresturisticos\/lugar_210422114750.jpg"
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


## Detalle Lugar Turistico




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/turismodetalle"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/lugaresturisticos\/lugar_210513145930.jpg"
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


## Listado de Categorias Restaurante




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/restaurantecategorias"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/restaurantes\/categorias\/restaurantecategoria_210422153310.jpg"
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


## Listado de Productos Restaurante segun a la Categoria que pertenecen




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/restauranteproductos"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/restaurantes\/productos\/producto_210423115837.jpg"
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


## Deatelle Producto Restaurante




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/productodetalle"
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
    "foto": "http:\/\/pairumanibackoffice.test\/laravel\/public\/imagenes\/restaurantes\/productos\/producto_210423115837.jpg"
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


## Creacion de la Reserva de una Habitacion




> Example request:

```javascript
const url = new URL(
    "http://pairumanibackoffice.test/api/reservahabitacion"
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
    "ni\u00f1os": 2,
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
<b><code>niños</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="niños" data-endpoint="POSTapi-reservahabitacion" data-component="body" required  hidden>
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



