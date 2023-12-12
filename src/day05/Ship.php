<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day05;

class Ship {
    private const PATTERN_SIZE = 6;

    private const PATTERN_SPEED = [
        'aaabss' => -1,
        'aebsea' => 1,
        'bsrrlb' => 2
    ];

    public function getTravelTime(string $input): int {
        $symbols = str_split($input, self::PATTERN_SIZE);
        $travelTime = 0;

        foreach($symbols as $symbol) {
            if(array_key_exists($symbol, self::PATTERN_SPEED)) {
                if(self::PATTERN_SPEED[$symbol] < 0 && $travelTime === 0) {
                    continue;
                }

                $travelTime += self::PATTERN_SPEED[$symbol];
            }
        }
        return $travelTime;
    }
}
