<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:36 AM
 */

class Lekar extends Korisnik {

    private $specialization;

    public function __construct($username, $password, $firstName, $lastName, $specialization){
        parent::construct($username, $password, $firstName, $lastName);
        $this->specialization = $specialization;
    }

}