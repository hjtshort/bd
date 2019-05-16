<?php


namespace App\Helpers;


class PrintPrice
{
    public static function print(int $price)
    {
        $compare = $price / 1000;
        if ($compare >= 1) {
            return round($compare, 2). " tỷ";
        } else {
            return $price . " triệu";
        }
    }
}