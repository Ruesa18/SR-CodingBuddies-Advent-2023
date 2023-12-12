<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day03;

class Coordinate {
    public function __construct(
        protected int $x = 0,
        protected int $y = 0,
    ) {}

    public function add(int $x, int $y): void {
        $this->x += $x;
        $this->y += $y;
    }

    public function sum(): int {
        return $this->x + $this->y;
    }

    /**
     * @return int
     */
    public function getX(): int {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int {
        return $this->y;
    }
}
