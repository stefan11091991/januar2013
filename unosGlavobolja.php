<!DOCTYPE html>
<html>

<head>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
</head>
<body>

<div ng-app="" ng-controller = "unosController">
    duzinaGlavobolje <input type="number" ng-model = "duzinaGlavobolje">
    <br/>
    intenzitet <input type="number" ng-model = "intenzitet">
    <br/>
    opis terapije
    <br/>
    <textarea ng-model = "terapija" rows = "15" cols="100" >
        </textarea>
    <br/>
    <button  ng-click = "submit()">submit</button>

    <br/>



</div>

<script>
    function unosController($scope, $http)
    {
        $scope.duzinaGlavobolje = 1;
        $scope.intenzitet = 5;
        $scope.terapija = "";
        $scope.submit = function()
            {
               // alert("asdasa")
                //alert($scope.terapija);
                $http.post("server.php", {type : "unosGlavobolje", trajanje : $scope.duzinaGlavobolje,
                    terapija:$scope.terapija }).success($response)
                    {

                    }
            }

    }
</script>

</body>
</html>