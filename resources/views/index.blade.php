<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title>Practica3 </title>
    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/dashboard.css') }}" rel="stylesheet">
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
                    <th>Incidentes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipos as $equipo )
                <tr>
                    <td>{{$equipo->id}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Incidente</th>
                    <th>Equipo</th>
                    <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                @foreach($incidentes as $incidente )
                <tr>
                    <td>{{$incidente->id}}</td>
                    <td></td>
                    <td>{{$incidente->fecha}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Mantenimiento</th>
                    <th>Equipo</th>
                    <th>FechaInicio</th>
                    <th>FechaFin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mantenimientos as $mantenimiento )
                <tr>
                    <td>{{$mantenimiento->id}}</td>
                    <td></td>
                    <td>{{$mantenimiento->fechainicio}}</td>
                    <td>{{$mantenimiento->fechafin}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>


</body></html>