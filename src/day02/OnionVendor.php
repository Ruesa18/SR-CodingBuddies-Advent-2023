<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day02;

class OnionVendor {
    protected static float $normalPrice = 2.55;

    public function getDiscount(int $amount): float {
        if($amount <= 9) {
            return 0;
        }
        if($amount <= 19) {
            return 0.1 * self::$normalPrice;
        }
        if($amount <= 499) {
            return 0.2 * self::$normalPrice;
        }
        return 0.5 * self::$normalPrice;
    }

    public function calcMaxPossibleAmount(float $money): int {
        $boughtAmount = 0;

        if($money < self::$normalPrice) {
            return $boughtAmount;
        }
        do {
            $price = self::$normalPrice - $this->getDiscount($boughtAmount + 1);

            if($money - $price < 0) {
                break;
            }

            $money -= $price;
            $boughtAmount++;
        } while($money > 0.0);
        return $boughtAmount;
    }

    /**
     * @return float
     */
    public static function getNormalPrice(): float {
        return self::$normalPrice;
    }
}
