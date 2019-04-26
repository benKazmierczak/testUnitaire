<?php
// src/Util/Calculator.php
namespace App\Util;

class Calculator
{
    public function add(int $a, int $b) {
        return $a + $b;
    }

    public function sub(int $a, int $b) {
        return $a - $b;
    }

    public function mul(int $a, int $b) {
        return $a * $b;
    }

    public function div(int $a, int $b) {
        return $a / $b;
    }

    public function avg(array $a) {
        if(count($a)) {
            $a = array_filter($a);
            return array_sum($a)/count($a);
        }
    }
}