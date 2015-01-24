<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 11:37 AM
 */
if(!isset($_SESSION))
{
    session_start();
}

include_once 'db.php';
include_once 'Lekar.php';
include_once "Pacijent.php";
include_once "Korisnik.php";

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
                    //$_SESSION['privilegije'] = json_encode($result->korisnik);
                    $_SESSION['privilegije'] = "lekar";
                    $_SESSION['userName'] = $userName;
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
                   // $_SESSION['privilegije'] = json_encode($result->korisnik);
                    $_SESSION['privilegije'] = "pacijent";
                    $_SESSION['userName'] = $userName;

                }



            }
        }

        if($data->type == 'unosGlavobolje') {
            $datum=date("d-m-Y");
            //$korisnickoIme=$_SESSION['privilegije'];
            //$korisnickoIme = $korisnickoIme->userName;
            $korisnickoIme = $_SESSION['userName'];
            echo $korisnickoIme;
            $trajanje = $data->trajanje;
            $intenzitet = $data->intenzitet;
            $terapija = $data->terapija;

            $query="INSERT INTO `dnevnik` (korisnicko_ime, datum, trajanje, intenzitet, terapija)
                    VALUES (:korisnicko_ime, :datum, :trajanje, :intenzitet, :terapija)";
            $stmt = $db->prepare($query);
            $returnValue = $stmt->execute(array(':korisnicko_ime'=>$korisnickoIme, ':datum'=>$datum,
                ':trajanje'=>$trajanje, ':intenzitet'=>$intenzitet, ':terapija'=>$terapija));

            if($returnValue==false)
                $result->error_message = true;
            else
                $result->error_message = false;

        }





    }

    if ($method === 'GET') {
        if($_GET['type']==='statistika'){
            $query="SELECT dijagnoza, count(*) broj from `pacijenti` group by dijagnoza";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $o=$stmt->fetchAll();

            foreach($o as $row) {
                $statistikaDijagnoza[$row['dijagnoza']] = $row['broj'];
            }

            $query="SELECT p.dijagnoza, avg(d.trajanje+0.0) vreme
            from dnevnik d join pacijenti p on
            d.korisnicko_ime=p.korisnicko_ime
            group by p.dijagnoza";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $o=$stmt->fetchAll();

            foreach($o as $row) {
                $statistikaTrajanja[$row['dijagnoza']] = $row['vreme'];
            }

/*            $query="SELECT p.dijagnoza, avg(d.trajanje+0.0)
            from dnevnik d join pacijenti p on
            d.korisnicko_ime=p.korisnicko_ime
            group by p.dijagnoza";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $statistikaTrajanja=$stmt->fetchAll();
*/

            $result->statistikaDijagnoza = $statistikaDijagnoza;
            $result->statistikaTrajanja = $statistikaTrajanja;


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