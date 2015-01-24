<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 10:25 AM
 */

abstract class Korisnik {
public $username;
public $password;
public $name;

    function __construct($username, $password, $name){
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
    }

} 