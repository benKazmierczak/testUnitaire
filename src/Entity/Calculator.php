<?php

namespace App\Entity;


class Calculator
{
    public static function add(int $a, int $b)
    {
        return $a + $b;
    }
    public static function sub(int $a, int $b)
    {
        return $a - $b;
    }
    public static function mul(int $a, int $b)
    {
        return $a * $b;
    }
    public static function div(int $a, int $b)
    {
        return $b == 0 ? 'Erreur' : ($a / $b);
    }
    public static function avg(array $tab)
    {
        $count = count($tab);

        return $count == 0 ? 'Erreur' : array_sum($tab) / $count;
    }
}
