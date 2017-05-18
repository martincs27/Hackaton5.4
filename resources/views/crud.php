<!DOCTYPE html>
<html lang="en-US" ng-app="equipoRecords">
<head>
    <title>Laravel 5 AngularJS CRUD Example</title>

    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>
<body>
<h2>Equipos Database</h2>
<div  ng-controller="equiposController">

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('addEquipo', 0)">Add New Equipo</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="equipo in equipos">
            <td>{{  equipo.id }}</td>
            <td>{{ equipo.nombre }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('editEquipo', equipo.id)">Edit</button>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('mantenimientoEquipo', equipo.id)">Mantenimientos</button>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('incidenteEquipo', equipo.id)">Incidentes</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(equipo.id)">Delete</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="newIncidente(equipo.id)">Incidente</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmEquipos" class="form-horizontal" novalidate="">

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="nombre" name="nombre" placeholder="Nombre" value="{{nombre}}"
                                       ng-model="equipo.nombre" ng-required="true">
                                <span class="help-inline"
                                      ng-show="frmEquipos.nombre.$invalid && frmEquipos.nombre.$touched">Name field is required</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEquipos.$invalid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Mantenimientos</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>FechaInicio</th>
                            <th>FechaFin</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="mantenimientoEquipo in mantequipo">
                            <td>{{ mantenimientoEquipo.fechainicio}}</td>
                            <td>{{ mantenimientoEquipo.fechafin}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Incidentes</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="incidente in incequipo">
                            <td>{{ incidente.fecha}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/equipos.js') ?>"></script>
</body>
</html>