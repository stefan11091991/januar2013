<!DOCTYPE html>
<html>

<head>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
</head>

<body>

<div ng-app="" ng-controller="personController">

    Username: <input type="text" ng-model="userName"><br>
    Password: <input type="password" ng-model="password"><br>
    <br>
    <button ng-click="login()">login</button>


</div>

<script>
    function personController($scope, $http) {
        $scope.userName = "",
            $scope.password = "",
            $scope.login = function() {
                $http.post("server.php", {
                    userName: $scope.userName,
                    password : $scope.password,
                    type : 'login'

                })
                    .success(function(response) {
                       // alert(response);
                        if(response['error_status'] == false)
                        {
                           // alert("asdas");
                           // $_SESSION['privilegije'] = response['korisnik'];
                            alert(JSON.stringify(response));
                          //  $location.path("http://localhost:63342/jan2013/prikazStatistike.php");
                            //$location.replace();
                            window.location.replace("http://localhost:63342/jan2013/pocetna.php");

                        }

                                                });
            };
    }
</script>

</body>
</html>
