<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day04;

use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day04\ShipFinder;

class ShipFinderTest extends TestCase {
    protected ?ShipFinder $shipFinder;

    /** @dataProvider getExampleData */
    public function testExamples(string $input, int $expected): void {
        $result = $this->shipFinder->findLongestOccurrenceCount($input);

        $this->assertEquals($expected, $result);
    }

    public static function getExampleData(): array {
        return [
            [
                'input' => '1010-11110-11010-11010-1',
                'expected' => 2,
            ],
            [
                'input' => 'a-1?) 2',
                'expected' => 0,
            ],
            [
                'input' => '1010-1',
                'expected' => 1,
            ]
        ];
    }

    /**
     * @throws \JsonException
     */
    public function testFindSolution(): void {
        $dataArray = file_get_contents('data/04.json');
        $dataArray = json_decode($dataArray, false, 512, JSON_THROW_ON_ERROR);
        $data = implode($dataArray);
        $occurrenceCount = $this->shipFinder->findLongestOccurrenceCount($data);

        $this->assertIsInt($occurrenceCount);
        echo "\r\n\r\nDay 04";
        echo sprintf("\r\n\r\nThe solution is: %s\r\n\r\n", $occurrenceCount);
    }

    protected function setUp(): void {
        parent::setUp();

        $this->shipFinder = new ShipFinder();
    }

    protected function tearDown(): void {
        parent::tearDown();

        $this->shipFinder = null;
    }
}
