<?php

use App\Entity\Product;
use App\Entity\User;
use App\Entity\Exchange;
use App\Entity\DBConnection;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Product
     */
    protected $product;

    /**
     * @var User
     */
    protected $productOwner;

    /**
     * @var Exchange
     */
    protected $exchange;

    /**
     * @var DBConnection;
     */
    protected $DBConnection;

    protected function setUp(): void
    {
        $this->user = new User("Franck", "Dupont", "test@test.fr", 23);
        $this->productOwner = new User("Franck", "Owner", "test@owner.fr", 29);
        $this->product = new Product("NameProduct", $this->productOwner);

        $datetimeStart = new DateTime('tomorrow');
        $datetimeEnd = new DateTime('tomorrow + 1day');

        $this->exchange = new Exchange($this->user, $this->product, $datetimeStart, $datetimeEnd);

        $this->DBConnection = new DBConnection($this->product, $this->user, $this->exchange);
    }

    public function testValidSaveProduct() {
        $this->assertEquals(true, $this->DBConnection->saveProduct());
    }

    /**public function testInvalidSaveProductWithEmptyName() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Code error: 1");
        $this->product->setName("");
        $this->DBConnection = new DBConnection($this->product, $this->user, $this->exchange);
    }**/
}
