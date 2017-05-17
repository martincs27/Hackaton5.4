<!DOCTYPE html>
<html lang="en-US" ng-app="equipoRecords">
<head>
    <title>Laravel 5 AngularJS CRUD Example</title>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
<h2>Equipos Database</h2>
<div  ng-controller="equiposController">

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Equipo</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="equipo in equipos">
            <td>{{  equipo.id }}</td>
            <td>{{ equipo.name }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', equipo.id)">Edit</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(equipo.id)">Delete</button>
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
                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}"
                                       ng-model="equipo.name" ng-required="true">
                                <span class="help-inline"
                                      ng-show="frmEquipos.name.$invalid && frmEquipos.name.$touched">Name field is required</span>
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
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/equipos.js') ?>"></script>
</body>
</html>