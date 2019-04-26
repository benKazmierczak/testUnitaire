<?php

use App\Entity\Calculator;

use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(2, Calculator::add(2, 0));
    }

    public function testSubtraction()
    {
        $this->assertEquals(4, Calculator::sub(6, 2));
    }

    public function testMultiplication()
    {
        $this->assertEquals(24, Calculator::mul(12, 2));
    }

    public function testDivision()
    {
        $this->assertEquals(3, Calculator::div(6, 2));
    }

    public function testDivisionByZero()
    {
        $this->assertEquals('Erreur', Calculator::div(6, 0));
    }

    public function testDivisionWithZero()
    {
        $this->assertEquals(0, Calculator::div(0, 6));
    }

    public function testAverage()
    {
        $this->assertEquals(18.75, Calculator::avg([15, 10, 20, 30]));
    }

    public function testAverageWithEmptyInitialData()
    {
        $this->assertEquals('Erreur', Calculator::avg([]));
    }
}
