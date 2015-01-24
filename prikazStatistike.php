<!DOCTYPE html>
<html>
<head>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>


</head>
<body>

<div ng-app="" ng-controller="statistikaController">

    Username: <input type="text" ng-model="userName"><br>
    Password: <input type="password" ng-model="password"><br>
    <br>
    <button ng-click="login()">login</button>


</div>
<script>
    function statistikaController($scope, $http)
    {
        $http.get("server.php/?type=statistika").success(function(response)
        {
            alert(JSON.stringify(response));
        });


    }
</script>

</body>
</html>
