<?php
/**
 * Created by PhpStorm.
 * User: raso
 * Date: 1/24/2015
 * Time: 5:59 PM
 */

session_start();
if(isset($_SESSION['privilegije']) ) {
    $priv = $_SESSION['privilegije'];

    if ($priv instanceof Pacijent)
        header('Location: unosGlavobolja.php');
    else
        header('Location: prikazStatistike.php');
    exit;
}
include 'registracija.php';
?>