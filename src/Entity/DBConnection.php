<?php

namespace App\Entity;

use App\Entity\Product;
use App\Entity\User;
use App\Entity\Exchange;
use PHPUnit\Runner\Exception;

class DBConnection
{

    /**
     * @var Product
     */
    private $product;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Exchange
     */
    private $exchange;

	function __construct(Product $product, User $user, Exchange $exchange)
	{
	    $this->setProduct($product);
	    $this->setUser($user);
        $this->setExchange($exchange);
	}

    /**
     * @return bool
     */
	public function saveProduct()
	{
	    if($this->product instanceof Product && $this->product->isValid()) {
	        return true;
        }
        throw new Exception('Code error: 1');
	}

    /**
     * @return bool
     */
	public function saveUser()
	{
        if($this->user instanceof Product && $this->user->isValid()) {
            return true;
        }
        throw new Exception('Code error: 2');
	}

	public function saveExchange($exchange)
	{
		throw new Exception('Not implemented');
	}

    /**
     * @param Product $product
     */
	public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param User $user
     */
	public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Exchange $exchange
     */
	public function setExchange(Exchange $exchange)
    {
        $this->exchange = $exchange;
    }

    /**
     * @return Product
     */
    public function getProduct(): \App\Entity\Product
    {
        return $this->product;
    }

    /**
     * @return User
     */
    public function getUser(): \App\Entity\User
    {
        return $this->user;
    }

    /**
     * @return Exchange
     */
    public function getExchange(): \App\Entity\Exchange
    {
        return $this->exchange;
    }
}