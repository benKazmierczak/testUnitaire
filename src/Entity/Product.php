<?php

namespace App\Entity;

class Product
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var User
     */
    private $owner;

    public function __construct(string $name, User $user)
    {
        $this->setName($name);
        $this->setOwner($user);
    }

    public function isValid() {
        return !empty($this->getName()) && $this->owner->isValid();
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $user
     * @return Product
     */
    public function setOwner(User $user)
    {
        $this->owner = $user;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}