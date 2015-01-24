<?php
/**
 * Created by PhpStorm.
 * User: raso
 * Date: 1/24/2015
 * Time: 5:59 PM
 */

include_once "Korisnik.php";
include_once "Lekar.php";
include_once "Pacijent.php";


session_start();
//unset($_SESSION['privilegije']);

if(isset($_SESSION['privilegije']) ) {

    $priv = $_SESSION['privilegije'];
    var_dump($priv);

    if ($priv instanceof Pacijent)
        header('Location: unosGlavobolja.php');
    else
        header('Location: prikazStatistike.php');


    exit;
}
include 'registracija.php';
?>