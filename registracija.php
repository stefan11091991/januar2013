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
                //$scope.myVar = !$scope.myVar;
                alert(JSON.stringify({ userName: $scope.userName, password : $scope.password, type : 'login' }));
                $http.post("server.php", {
//                    data: JSON.stringify({ userName: $scope.userName, password : $scope.password, type : 'login' })
                    userName: $scope.userName,
                    password : $scope.password,
                    type : 'login'

                })
                    .success(function(response) {
                        alert(response);
//                                                      object = JSON.parse(response);
//                                                    var korisnickoIme = object.userName;
//                                                    var password = object.password;
//                                                    var type = object.type;
//                                                    alert(korisnickoIme + " " + " " + password + " " + type);
                                                });
            };
    }
</script>

</body>
</html>
