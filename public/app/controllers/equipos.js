app.controller('equiposController', function($scope, $http, API_URL) {
    //retrieve equipos listing from API
    $http.get(API_URL + "equipos")
        .success(function(response) {
            $scope.equipos = response;
        });
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'addEquipo':
                        $scope.form_title = "Add New Equipo";
                        console.log(id);
                        $('#myModal').modal('show');
                        break;
                    case 'addMantenimiento':
                        console.log(id);
                        $('#myModal4').modal('show');
                        break;
                    case 'editEquipo':
                        $scope.form_title = "Equipo Detail";
                        $scope.id = id;
                        $http.get(API_URL + 'equipos/' + id)
                            .success(function(response) {
                                console.log(response);
                                $scope.equipo = response;
                            });
                        console.log(id);
                        $('#myModal').modal('show');
                        break;
                    case 'mantenimientoEquipo':
                        $scope.id = id;
                        $http.get(API_URL + 'equipos/mant/' + id)
                            .success(function(response) {
                                console.log(response);
                                $scope.mantequipo = response;
                            });
                        console.log(id);
                        $('#myModal2').modal('show');
                        break;
                    case 'incidenteEquipo':
                        $scope.id = id;
                        $http.get(API_URL + 'equipos/inc/' + id)
                            .success(function(response) {
                                console.log(response);
                                $scope.incequipo = response;
                            });
                        console.log(id);
                        $('#myModal3').modal('show');
                        break;
                    default:
                        break;
                }
    }
    $scope.save = function(modalstate, id) {
        var url = API_URL + "equipos";

        //append equipo id to the URL if the form is in edit mode
        if (modalstate === 'editEquipo'){
            url += "/" + id;
            $http({
                method: 'PUT',
                url: url,
                data: $.param($scope.equipo),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);
                location.reload();
            }).error(function(response) {
                console.log(response);
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        }else if(modalstate === 'addEquipo'){
            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.equipo),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);
                location.reload();
            }).error(function(response) {
                console.log(response);
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        }else if(modalstate === 'addMantenimiento'){
            $http({
                method: 'POST',
                url: "/newman/"+id,
                data: $.param($scope.mantenimiento),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);
                location.reload();
            }).error(function(response) {
                console.log(response);
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        }
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'equipos/' + id
            }).
            success(function(data) {
                console.log(data);
                location.reload();
            }).
            error(function(data) {
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
    $scope.newIncidente = function(id) {
        $http({
            method: 'GET',
            url: API_URL + 'newinc/' + id
        }).
        success(function(data) {
            console.log(data);
            location.reload();
        }).
        error(function(data) {
            console.log(data);
            alert('Unable to save');
        });
    }
});
