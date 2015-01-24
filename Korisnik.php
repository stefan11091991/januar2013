<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:25 AM
 */

abstract class Korisnik {
private $username;
private $password;
private $firstName;
private $lastName;
    public function __construct($username, $password, $firstName, $lastName){
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

} 