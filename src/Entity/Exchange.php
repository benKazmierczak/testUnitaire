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
     */
    public function setReceiver($receiver){
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getProduct(){
        return $this->product;
    }

    /**
     * @param $product
     */
    public function setProduct($product){
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getFirstDate(){
        return $this->firstDate;
    }

    /**
     * @param $firstDate
     */
    public function setFirstDate($firstDate){
        $this->firstDate = $firstDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate(){
        return $this->endDate;
    }

    /**
     * @param $endDate
     */
    public function setEndDate($endDate){
        $this->endDate = $endDate;
    }
}