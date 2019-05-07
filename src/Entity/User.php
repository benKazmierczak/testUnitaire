<?php

namespace App\Entity;

class User {

    private $firstname;

    private $email;

    private $lastname;

    private $age;

    public function __construct(string $firstname, string $lastname, string $email, int $age)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setAge($age);
    }

    public function isValid() {
        return $this->isValidEmail()
                && $this->getAge() >= 13;
    }

    public function isValidEmail()
    {
        return filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)
            && !empty($this->getFirstname())
            && !empty($this->getLastname());
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

}
