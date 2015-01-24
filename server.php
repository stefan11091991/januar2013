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

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'POST') {

        $data = file_get_contents('php://input');
        $data1 = json_decode($data);

        if($data1->type == 'login') {

            $result->data = $data;
            $result->error_status=false;

        }



    }
}
catch(Exception $e)
{
    $result->error_status=true;
    $result->error_message = $e->getMessage();
}

echo $result->data;
?>