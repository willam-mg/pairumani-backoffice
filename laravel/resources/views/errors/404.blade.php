@extends ('layouts.admin')
@section ('contenido')
    <div class="box-admin">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="panel-tittle">
                        <h2>Sistema Administrativo</h2>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive center-block" src="{{ asset('imagenes/error.png')}}">
                        <hr>
                        <strong class="text-center">
                            <p class="text-center"><h3>Objeto no localizado</h3></p>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection