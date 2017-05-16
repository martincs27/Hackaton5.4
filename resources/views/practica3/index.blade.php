<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title>Practica3 </title>
    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/bootstrap/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://getbootstrap.com/examples/dashboard/#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main">
            <table class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Ganancia</th>
                    <th>Fecha Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sandwiches as $sandwich )
                <tr>
                    <td>{{$sandwich->id}}</td>
                    <td>{{$sandwich->nombre}}</td>
                    <td>S/.{{$sandwich->pcompra}}</td>
                    <td>S/.{{$sandwich->pventa}}</td>
                    <td>S/.{{$sandwich->ganancia}}</td>
                    <td>{{$sandwich->fvencimiento}}</td>
                    <td>
                        @if($sandwich->estado=='Caducado')
                            <div class="alert alert-danger" style="padding:4px; margin:0px; display:inline-block;">
                                <strong>Caducado</strong>
                            </div>
                        @elseif ($sandwich->estado=='Por caducar')
                            <div class="alert alert-warning" style="padding:4px; margin:0px; display:inline-block;">
                                <strong>Por caducar</strong>
                            </div>
                        @else
                            <div class="alert alert-success" style="padding:4px; margin:0px; display:inline-block;">
                                <strong>Para consumo</strong>
                            </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ URL::to('sandwich/edit/'.$sandwich->id) }}" class="btn btn-info btn-sm" role="button">Editar</a>
                        <a href="{{ URL::to('sandwich/destroy/'.$sandwich->id) }}" class="btn btn-danger btn-sm" role="button">Eliminar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            Ganancia Total: S/.{{$gananciatotal}}
            <br>
            <a href="{{ URL::to('sandwich/create') }}" class="btn btn-primary" role="button">Insertar</a>
        </div>
    </div>
</div>

<script src="{{ url('/assets/bootstrap/js/jquery.min.js') }}"></script>
<script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>


</body></html>