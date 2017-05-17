app.controller('equiposController', function($scope, $http, API_URL) {
    //retrieve equipos listing from API
    $http.get(API_URL + "equipos")
        .success(function(response) {
            $scope.equipos = response;
        });
    $http.get(API_URL + "incidentes")
        .success(function(response) {
            $scope.incidentes = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (id) {
            case 0:
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Add New Equipo";
                        break;
                    case 'edit':
                        $scope.form_title = "Equipo Detail";
                        $scope.id = id;
                        $http.get(API_URL + 'equipos/' + id)
                            .success(function(response) {
                                console.log(response);
                                $scope.equipo = response;
                            });
                        break;
                    default:
                        break;
                }
                console.log(id);
                $('#myModal').modal('show');
                break;
            case 1:
                $scope.form_title = "Add New Incidente";
                console.log(id);
                $('#myModal2').modal('show');
                break;
        }
    }
    $scope.save = function(modalstate, id) {
        var url = API_URL + "equipos";

        //append equipo id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

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
});
