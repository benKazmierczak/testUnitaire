<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2019-04-26
 * Time: 15:24
 */

class Product {

    public $nom;
    public $owner;

    public function __construct($nom, $owner){
        $this->nom = $nom;
        $this->owner = $owner;
    }

    public function isValid(){

    }


    public function setNom(string $nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setOwner($owner){
        $this->owner = $owner;
    }

    public function getOwner(){
        return $this->owner;
    }
}