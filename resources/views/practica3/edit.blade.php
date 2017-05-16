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
            <form class="form-horizontal" action="{{ URL::to('sandwich/update') }}" method="post">
                <input type="hidden" name="id" value="{{$sandwich->id}}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre del sandwich" value="{{$sandwich->nombre}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pcompra">Precio Compra:</label>
                    <div class="col-sm-4">
                        <input type="number" name="pcompra" step="0.01" class="form-control" id="pcompra" value="{{$sandwich->pcompra}}" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pventa">Precio Venta:</label>
                    <div class="col-sm-4">
                        <input type="number" name="pventa" step="0.01" class="form-control" id="pventa" value="{{$sandwich->pventa}}" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pcompra">Fecha de vencimiento:</label>
                    <div class="col-sm-4">
                        <input type="date" name="fvencimiento" class="form-control" id="fvencimiento" value="{{$sandwich->fvencimiento}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ url('/assets/bootstrap/js/jquery.min.js') }}"></script>
<script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>


</body></html>