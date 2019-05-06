<?php

use App\Entity\User;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        $this->user = new User("Franck", "Dupont", "test@test.fr", 23);
    }

    public function testIsValid() {
        $this->assertEquals(true, $this->user->isValid());
    }

    public function testAgeLessThanThirtheen() {
        $this->user->setAge(12);
        $this->assertEquals(false, $this->user->isValid());
    }

    public function testEmailIsWrong() {
        $this->user->setEmail("Franck.com");
        $this->assertEquals(false, $this->user->isValid());
    }

    public function testIsValidEmail() {
        $this->assertEquals(true, $this->user->isValid());
    }

    public function testHasNoFirstname() {
        $this->user->setFirstname("");
        $this->assertEquals(false, $this->user->isValid());
    }

    public function testHasNoLastname() {
        $this->user->setLastname("");
        $this->assertEquals(false, $this->user->isValid());
    }
}
