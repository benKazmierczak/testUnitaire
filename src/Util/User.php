<?php
// src/Util/User.php

class User {

    public $email;
    public $nom;
    public $prenom;
    public $age;

    public function __construct($email, $nom, $prenom, $age){
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }
}