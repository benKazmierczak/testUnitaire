<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 2019-04-26
 * Time: 17:07
 */

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Exchange;

class ExchangeTest extends TestCase {
    protected $exchange;
    private $majorAge = 18;
    //private $receiver;
    //private $product;

    protected function setUp(): void
    {
        $this->receiver = new User("John", "Doe", "toto@to.fr", 25);

        $owner = new User("Franck", "Dupont", "test@test.fr", 23);
        $this->product = new Product("objectName", $owner);

        $startDate = new DateTime();
        $startDate->setDate(2019, 7, 10);

        $endDate = new DateTime();
        $endDate->setDate(2019, 11, 10);

        $this->exchange = new Exchange($this->receiver, $this->product, $startDate, $endDate);
    }

    public function testSave() {
        $this->assertEquals(true, $this->exchange->save());
    }

    public function testStartDateIsUpperToCurrentDate() {
        $startDate = new DateTime();
        $startDate->setDate(2019, 5, 10);

        $this->exchange->setStartDate($startDate);
        $this->assertEquals(true,  $this->exchange->getStartDate() > new \DateTime('NOW'));
    }

    public function testEndDateIsUpperToStartDate(){

        $startDate = new DateTime();
        $startDate->setDate(2019, 5, 10);

        $endDate = new DateTime();
        $endDate->setDate(2020, 5, 10);

        $this->exchange->setStartDate($startDate);
        $this->exchange->setEndDate($endDate);

        $this->assertEquals(true, $this->exchange->getStartDate() < $this->exchange->getEndDate());
    }

    public function testProductHadOwner(){
        $receiver = new User("Franck", "Dupont", "test@test.fr", 23);
        $this->exchange->setReceiver($receiver);
        $this->assertInstanceOf('App\Entity\User', $this->exchange->getReceiver());
    }

    public function testIsReceiverIsMajor(){
        $this->exchange->getReceiver()->setAge(25);
        $this->assertEquals(true, $this->exchange->getReceiver()->getAge() >= $this->majorAge);
    }
}