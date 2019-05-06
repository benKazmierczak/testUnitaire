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

    protected function setUp(): void
    {
        $owner = new User("Franck", "Dupont", "test@test.fr", 23);

        $this->product = new Product("objectName", $owner);
    }

    public function testIsValid() {
        $this->assertEquals(true, $this->product->isValid());
    }

    public function testStartDateIsUpperToCurrentDate() {
        $this->exchange->setStarDate('10/05/2019');
        $this->assertEquals(false, $this->exchange->save());
    }
}