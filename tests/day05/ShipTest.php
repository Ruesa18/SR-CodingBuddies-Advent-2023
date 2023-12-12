<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day05;

use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day05\Ship;

class ShipTest extends TestCase {
    protected ?Ship $ship;

    /** @dataProvider getExampleData */
    public function testExamples(string $input, int $expected): void {
        $travelTime = $this->ship->getTravelTime($input);

        $this->assertEquals($expected, $travelTime);
    }

    public static function getExampleData(): array {
        return [
            [
                'input' => 'aebseaabsllb',
                'expected' => 1,
            ],
            [
                'input' => 'aaabssaebseaaaabss',
                'expected' => 0,
            ],
            [
                'input' => 'absllbbsrrlbaaabss',
                'expected' => 1,
            ],
            [
                'input' => 'bsrrlbbsrrlb',
                'expected' => 4,
            ]
        ];
    }

    public function testFindSolution(): void {
        $data = file_get_contents('data/05.txt');
        $travelTime = $this->ship->getTravelTime($data);

        $this->assertIsInt($travelTime);
        echo "\r\n\r\nDay 05";
        echo sprintf("\r\n\r\nThe solution is: %s\r\n\r\n", $travelTime);
    }


    protected function setUp(): void {
        parent::setUp();

        $this->ship = new Ship();
    }

    protected function tearDown(): void {
        parent::tearDown();

        $this->ship = null;
    }
}
