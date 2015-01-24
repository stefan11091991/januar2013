<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:30 AM
 */

class Pacijent extends Korisnik {

    private $gender;
    private $yearOfBirth;
    private $diagnosis;

    public function __construct($username, $password, $firstName, $lastName,
    $gender, $yearOfBirth, $diagnosis){
        parent::construct($username, $password, $firstName, $lastName);
        $this->gender = $gender;
        $this->yearOfBirth = $yearOfBirth;
        $this->diagnosis = $diagnosis;
    }
}
