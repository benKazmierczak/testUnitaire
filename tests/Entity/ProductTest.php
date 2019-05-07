<?php


use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\Product;

class ProductTest extends TestCase
{
    /**
     * @var Product
     */
    protected $product;

    protected function setUp(): void
    {
        $date =  new \DateTime('NOW');
        $owner = new User("Franck", "Dupont", "test@test.fr", 23);

        $this->product = new Product("objectName", $owner);
    }

    public function testIsValid() {
        $this->assertEquals(true, $this->product->isValid());
    }

    public function testEmptyStringName() {
        $this->product->setName("");
        $this->assertEquals(false, $this->product->isValid());
    }

    public function testWithTooMuchYoungerOwner() {
        $this->product->getOwner()->setAge(1);
        $this->assertEquals(false, $this->product->isValid());
    }

    public function testProductHadOwner(){
        $owner = new User("Franck", "Dupont", "test@test.fr", 23);
        $this->product->setOwner($owner);
        $this->assertInstanceOf('App\Entity\User', $this->product->getOwner());
    }
}