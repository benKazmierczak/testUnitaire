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

    private $startDate;

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

        $this->exchange = new Exchange($this->receiver, $this->product, $this->startDate, $this->endDate);
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

    public function testValidMockSendMail()
    {
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())
            ->method("sendEmail")
            ->willReturn(true);

        $this->assertEquals(true, $this->exchange->save());
    }

    /**
     * L'utilisateur a moins de 13 ans, mais son email est correct :
     * -> Attendu :
     *      sendEmail = false, car le recever email n'est pas bon
     *      save = false, car le receiver email n'est pas bon
     */
    public function testInvalidEmailMockSendMail()
    {
        $UserTest = new User("John", "Booo", "qsdqsdqdqsdqsdqds", 12);
        $exchange = new Exchange($UserTest, $this->product, $this->startDate, $this->endDate);
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())
            ->method("sendEmail")
            ->willReturn(false);

        $this->assertEquals(false, $exchange->save());
        $this->assertEquals(false, $emailSender->sendEmail($UserTest));
    }

    /**
     * L'utilisateur a moins de 13 ans, mais son email est correct :
     * -> Attendu :
     *      sendEmail = true, car le receiver a moins de 13 ans
     *      save = true, car rien indique dans les consignes de bloquer le save
     */
    public function testTooYoungerReceiverMockSendMail()
    {
        $UserTest = new User("John", "Booo", "test@test.fr", 12);
        $exchange = new Exchange($UserTest, $this->product, $this->startDate, $this->endDate);
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())
            ->method("sendEmail")
            ->willReturn(true);

        $this->assertEquals(true, $exchange->save());
        $this->assertEquals(true, $emailSender->sendEmail($UserTest));
    }
}