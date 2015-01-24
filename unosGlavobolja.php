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
    opis problema
    <br/>
    <textarea ng-model = "opis" rows = "15" cols="100" >
        </textarea>
    <br/>
    {{opis}}


</div>

<script>
    function unosController($scope)
    {
        $scope.duzinaGlavobolje = 1;
        $scope.intenzitet = 5;
        $scope.opis = "";

    }
</script>

</body>
</html>