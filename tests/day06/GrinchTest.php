<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day06;

use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day06\Grinch;

class GrinchTest extends TestCase {

    protected ?Grinch $grinch;

    /** @dataProvider getExampleData */
    public function testExamples(int $goalDistance, int $jumpDistance, int $expected): void {
        $jumpCount = $this->grinch->countJumps($goalDistance, $jumpDistance);

        $this->assertEquals($expected, $jumpCount);
    }

    public static function getExampleData(): array {
        return [
            [
                'goalDistance' => 0,
                'jumpDistance' => 10,
                'expected' => 0,
            ],
            [
                'goalDistance' => 35,
                'jumpDistance' => 5,
                'expected' => 15,
            ],
            [
                'goalDistance' => 4,
                'jumpDistance' => 2,
                'expected' => 3,
            ]
        ];
    }

    public function testFindSolution(): void {
        $jumpCount = $this->grinch->countJumps(550, 14);

        $this->assertIsInt($jumpCount);
        echo "\r\n\r\nDay 06";
        echo sprintf("\r\n\r\nThe solution is: %s\r\n\r\n", $jumpCount);
    }

    protected function setUp(): void {
        parent::setUp();

        $this->grinch = new Grinch();
    }

    protected function tearDown(): void {
        parent::tearDown();

        $this->grinch = null;
    }
}
