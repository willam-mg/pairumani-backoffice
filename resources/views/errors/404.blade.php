@extends ('layouts.admin')
@section ('contenido')
    <div class=".col-md-6 offset-md-3 text-center">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{ asset('imagenes/error.png')}}" alt="Card image cap">
            <div class="card-body">
                <h1 class="title">404</h1>
                <h2>Página no encontrada</h2>
                <h4>Ooooups! Parece que te perdiste.</h4>
            </div>
        </div>
    </div>
@endsection