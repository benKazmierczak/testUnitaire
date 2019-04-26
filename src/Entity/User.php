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

        return filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)
                && !empty($this->getFirstname())
                && !empty($this->getLastname())
                && $this->getAge() >= 13;

    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return User
     */
    public function setFirstname(String $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail(String $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return User
     */
    public function setLastname(String $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return User
     */
    public function setAge(int $age)
    {
        $this->age = $age;
        return $this;
    }

}
