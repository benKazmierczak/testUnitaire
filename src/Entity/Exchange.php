<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2019-04-26
 * Time: 16:26
 */

namespace App\Entity;

class Exchange
{
    private $receiver;
    private $product;
    private $owner;
    private $firstDate;
    private $endDate;

    public function __construct(User $receiver, Product $product, date $firstDate, date $endDate)
    {
        $this->setReceiver($receiver);
        $this->setProduct($product);
        $this->setFirstDate($firstDate);
        $this->setEndDate($endDate);
    }

    public function save(){

    }

    /**
     * @return mixed
     */
    public function getReceiver(){
        return $this->receiver;
    }

    /**
     * @param $receiver
     * @return $this
     */
    public function setReceiver($receiver){
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduct(){
        return $this->product;
    }

    /**
     * @param $product
     * @return $this
     */
    public function setProduct($product){
        $this->product = $product;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstDate(){
        return $this->firstDate;
    }

    /**
     * @param $firstDate
     * @return $this
     */
    public function setFirstDate($firstDate){
        $this->firstDate = $firstDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate(){
        return $this->endDate;
    }

    /**
     * @param $endDate
     * @return $this
     */
    public function setEndDate($endDate){
        $this->endDate = $endDate;
        return $this;
    }
}