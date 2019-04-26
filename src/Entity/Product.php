<?php

namespace App\Entity;

class Product
{
    private $name;
    private $user;

    public function __construct(string $name, User $user)
    {
        $this->setName($name);
        $this->setUser($user);
    }

    public function isValid() {
        return !empty($this->getName()) && $this->user->isValid();
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Product
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}