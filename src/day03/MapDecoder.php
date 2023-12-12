<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day03;

class MapDecoder {
    public function decode(string $input): Coordinate {
        $symbols = str_split($input);
        $coordinate = new Coordinate();

        foreach($symbols as $symbol) {
            switch($symbol) {
                case '^':
                    $coordinate->add(0, 1);
                    break;
                case 'v':
                    $coordinate->add(0, -1);
                    break;
                case '<':
                    $coordinate->add(-1, 0);
                    break;
                case '>':
                    $coordinate->add(1, 0);
                    break;
                default:
                    throw new \RuntimeException(sprintf('Could not process symbol %s', $symbol));
            }
        }
        return $coordinate;
    }
}
