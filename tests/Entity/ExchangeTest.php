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
use App\Entity\EmailSender;
use App\Entity\DBConnection;

class ExchangeTest extends TestCase {

    /**
     * @var Exchange
     */
    protected $exchange;

    /**
     * @var int
     */
    private $majorAge = 18;

    /**
     * @var User
     */
    private $receiver;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var DateTime
     */
    private $startDate;

    /**
     * @var DateTime
     */
    private $endDate;

    protected function setUp(): void
    {
        $this->receiver = new User("John", "Test", "toto@to.fr", 25);
        $owner = new User("Franck", "Dupont", "test@test.fr", 23);
        $this->product = new Product("objectName", $owner);
        $this->startDate = new DateTime();
        $this->startDate->setDate(2019, 7, 10);
        $this->endDate = new DateTime();
        $this->endDate->setDate(2019, 11, 10);
    }

    public function testValidMockSendMail()
    {
        $UserTest = new User("John", "Booo", "test", 12);
        $exchange = new Exchange($UserTest, $this->product, $this->startDate, $this->endDate);
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())
            ->method("sendEmail")
            ->willReturn(false);

        $this->assertEquals(false, $exchange->save());
        $this->assertEquals(false, $emailSender->sendEmail());

    }
}