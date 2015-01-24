<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:36 AM
 */
include_once "Korisnik.php";


class Lekar extends Korisnik {

    public $specialization;

    function __construct($username, $password, $name, $specialization){
        parent::__construct($username, $password, $name);
        $this->specialization = $specialization;
    }


}