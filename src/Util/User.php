<?php

namespace App\Util;

use PHPUnit\Runner\Exception;

class User {

    public $email;
    public $nom;
    public $prenom;
    public $age;

    public function __construct(){
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception("Invalid email");
        }
    }
}