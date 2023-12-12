<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day06;

class Grinch {
    public function countJumps(int $goalDistance, int $jumpDistance): int {
        $jumpMax = 1;
        $jumpCount = 0;
        $i = 0;

        while($goalDistance > 0 && $jumpDistance >= 0) {
            $i++;
            $goalDistance -= $jumpDistance;
            $jumpCount++;

            if($jumpCount === $jumpMax) {
                $jumpDistance--;
                $jumpMax++;
                $jumpCount = 0;
            }
        }
        return $i;
    }
}
