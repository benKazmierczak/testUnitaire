<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2019-04-26
 * Time: 16:26
 */

namespace App\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\EmailSender;
use App\Entity\DBConnection;

class Exchange
{
    /**
     * @var User
     */
    private $receiver;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    public function __construct(User $receiver, Product $product, \DateTime $startDate, \DateTime $endDate)
    {
        $this->setReceiver($receiver);
        $this->setProduct($product);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
    }

    public function save(){
        $email = new EmailSender();
        $email->sendEmail($this->receiver, "Message");

        return $this->product->isValid() && $this->receiver->isValidEmail() && $this->startDate > new \DateTime('NOW')  && $this->endDate > $this->startDate;
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
    public function getStartDate(){
        return $this->startDate;
    }

    /**
     * @param $startDate
     */
    public function setStartDate($startDate){
        $this->startDate = $startDate;
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