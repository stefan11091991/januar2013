<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:30 AM
 */
include_once "Korisnik.php";

class Pacijent extends Korisnik {

    public $gender;
    public $yearOfBirth;
    public $diagnosis;

    function __construct($username, $password, $name,
    $gender, $yearOfBirth, $diagnosis){
        parent::__construct($username, $password, $name);
        $this->gender = $gender;
        $this->yearOfBirth = $yearOfBirth;
        $this->diagnosis = $diagnosis;
    }
}
