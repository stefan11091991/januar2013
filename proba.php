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

    echo json_encode($result);
}
catch(Exception $e)
{
    $result->error_status=true;
    $result->error_message = $e->getMessage();
}

//echo $result->error_status;

?>