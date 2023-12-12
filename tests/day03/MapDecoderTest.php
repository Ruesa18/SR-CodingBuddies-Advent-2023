<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day03;

use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day03\MapDecoder;

class MapDecoderTest extends TestCase {
    protected ?MapDecoder $decoder;

    /** @dataProvider getExampleData */
    public function testExamples(string $input, int $expectedX, int $expectedY, int $expectedSum): void {
        $coordinate = $this->decoder->decode($input);

        $this->assertEquals($expectedX, $coordinate->getX());
        $this->assertEquals($expectedY, $coordinate->getY());
        $this->assertEquals($expectedSum, $coordinate->sum());
    }

    public static function getExampleData(): array {
        return [
            [
                'input' => '^^vvv<>>^^',
                'expectedX' => 1,
                'expectedY' => 1,
                'expectedSum' => 2,
            ],
            [
                'input' => '<>^v',
                'expectedX' => 0,
                'expectedY' => 0,
                'expectedSum' => 0,
            ],
            [
                'input' => 'vvv^><<<',
                'expectedX' => -2,
                'expectedY' => -2,
                'expectedSum' => -4,
            ]
        ];
    }

    public function testFindSolution(): void {
        $data = file_get_contents('data/03.txt');
        $coordinate = $this->decoder->decode($data);

        $this->assertIsInt($coordinate->sum());
        echo "\r\n\r\nDay 03";
        echo sprintf("\r\n\r\nThe solution is: %s from x: %s, y: %s\r\n\r\n", $coordinate->sum(), $coordinate->getX(), $coordinate->getY());
    }

    public function setUp(): void {
        parent::setUp();

        $this->decoder = new MapDecoder();
    }

    protected function tearDown(): void {
        parent::tearDown();

        $this->decoder = null;
    }
}
