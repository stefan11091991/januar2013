<?php
/**
 * Created by PhpStorm.
 * User: raso
 * Date: 1/24/2015
 * Time: 5:59 PM
 */

session_start();
if(isset($_SESSION['privilegije']) || true ) {
    header('Location: unosGlavobolja.php');
    exit;
}
include 'registracija.php';
?>