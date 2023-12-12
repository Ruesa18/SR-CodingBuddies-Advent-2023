<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day04;

class ShipFinder {
    private string $pattern = '1010-1';

    public function findLongestOccurrenceCount(string $input): int {
        $regex = sprintf('/(%s)*/', $this->pattern);
        $matches = [];
        preg_match_all($regex, $input, $matches, PREG_PATTERN_ORDER);

        $biggestMatch = 0;
        foreach($matches[0] as $match) {
            $symbolCount = strlen($match) / strlen($this->pattern);

            if($symbolCount > $biggestMatch) {
                $biggestMatch = (int) $symbolCount;
            }
        }
        return $biggestMatch;
    }
}
