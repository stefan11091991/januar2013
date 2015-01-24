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
                        alert(response.userName + " " + response.password + " " + response.type);

                                                });
            };
    }
</script>

</body>
</html>
