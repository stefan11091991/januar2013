<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 11:37 AM
 */
include_once 'db.php';
include_once 'Lekar.php';
include_once "Pacijent.php";

$result = new stdClass();
try {
    $db = db::getConnectionInstance();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'POST') {

        $data = file_get_contents('php://input');
        $data = json_decode($data);

        if($data->type == 'login') {

            $userName = $data->userName;
            $password = $data->password;
//            echo "username and password " . $userName . '  ' . $password;

            $query="SELECT count(*) FROM `korisnici` WHERE korisnicko_ime=:korisnickoIme
            and sifra = :sifra";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":korisnickoIme", trim($userName), PDO::PARAM_STR);
            $stmt->bindParam(":sifra", trim($password), PDO::PARAM_STR);
            $stmt->execute();
            $o=$stmt->fetchAll();
            $broj=$o[0][0];

//            echo $broj;

            if($broj==0)
                $result->error_status = true;
            else {
                $result->error_status = false;

                $query="SELECT `mod` FROM `korisnici` WHERE korisnicko_ime=:korisnickoIme
                and sifra = :sifra";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":korisnickoIme", trim($userName), PDO::PARAM_STR);
                $stmt->bindParam(":sifra", trim($password), PDO::PARAM_STR);
                $stmt->execute();
                $o=$stmt->fetchAll();
                $mod=$o[0][0];

                if(strcmp($mod, 'lekar')==0){
                    $query="SELECT ime_prezime, specijalizacija FROM `lekari` WHERE korisnicko_ime=:korisnickoIme";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(":korisnickoIme", trim($userName), PDO::PARAM_STR);
                    $stmt->execute();
                    $o=$stmt->fetchAll();
                    $name = $o[0][0];
                    $specialization=$o[0][1];


                    $result->korisnik = new Lekar($userName, $password, $name, $specialization);
                    echo $result->korisnik->specialization;
                }
                else if(strcmp($mod, 'pacijent')==0){
                    $query="SELECT ime_prezime, pol, godina_rodjenja, dijagnoza
                    FROM `pacijenti` WHERE korisnicko_ime=:korisnickoIme";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(":korisnickoIme", trim($userName), PDO::PARAM_STR);
                    $stmt->execute();
                    $o=$stmt->fetchAll();
                    $name = $o[0][0];
                    $gender=$o[0][1];
                    $yearOfBirth = $o[0][2];
                    $diagnosis = $o[0][3];


                    $result->korisnik = new Pacijent($userName, $password, $name, $gender, $yearOfBirth, $diagnosis);

                }



            }
        }



    }
}
catch(Exception $e)
{
    $result->error_status=true;
    $result->error_message = $e->getMessage();
}

echo json_encode($result);
?>