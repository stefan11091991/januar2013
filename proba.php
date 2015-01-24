<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 11:37 AM
 */
include 'db.php';

$result = new stdClass();
try {
    $db = db::getConnectionInstance();

            $userName = 'aleksandra';
            $password = 'alex';

    echo 'Novi program';

            $query="SELECT * FROM `korisnici` where ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $o=$stmt->fetchAll();
            $broj=$o[0][0];

            echo 'broj je ' . $broj;

}
catch(Exception $e)
{
    $result->error_status=true;
    $result->error_message = $e->getMessage();
}

//echo $result->error_status;

?>