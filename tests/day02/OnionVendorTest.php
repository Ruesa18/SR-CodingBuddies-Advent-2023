<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day02;

use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day02\OnionVendor;

class OnionVendorTest extends TestCase {
    protected ?OnionVendor $onionVendor;

    public function testFindSolution(): void {
        $money = 1337;
        $onionCount = $this->onionVendor->calcMaxPossibleAmount($money);

        $this->assertIsInt($onionCount);
        echo "\r\n\r\nDay 02";
        echo sprintf("\r\nThe solution is 10%% of %s: %s\r\n\r\n", $onionCount, (int)($onionCount * 0.1));
    }

    /** @dataProvider getDataForMaxPossibleAmount */
    public function testCalcMaxPossibleAmount(float $input, int $expected): void {
        $onionCount = $this->onionVendor->calcMaxPossibleAmount($input);

        $this->assertEquals($expected, $onionCount);
    }

    public static function getDataForMaxPossibleAmount(): array {
        return [
            [
                'input' => 0,
                'expected' => 0,
            ],
            [
                'input' => 1,
                'expected' => 0,
            ],
            [
                'input' => 2.55,
                'expected' => 1,
            ],
            [
                'input' => 6,
                'expected' => 2,
            ],
            [
                'input' => 25.25,
                'expected' => 10,
            ]
        ];
    }

    /** @dataProvider getDataForDiscount */
    public function testGetDiscount(int $amount, float $expected): void {
        $onionCount = $this->onionVendor->getDiscount($amount);

        $this->assertEquals($expected, $onionCount);
    }

    public static function getDataForDiscount(): array {
        return [
            [
                'amount' => 1,
                'expected' => 0,
            ],
            [
                'amount' => 9,
                'expected' => 0,
            ],
            [
                'amount' => 10,
                'expected' => OnionVendor::getNormalPrice() * 0.1,
            ],
            [
                'amount' => 19,
                'expected' => OnionVendor::getNormalPrice() * 0.1,
            ],
            [
                'amount' => 20,
                'expected' => OnionVendor::getNormalPrice() * 0.2,
            ],
            [
                'amount' => 499,
                'expected' => OnionVendor::getNormalPrice() * 0.2,
            ],
            [
                'amount' => 500,
                'expected' => OnionVendor::getNormalPrice() * 0.5,
            ],
            [
                'amount' => 99999,
                'expected' => OnionVendor::getNormalPrice() * 0.5,
            ],
        ];
    }

    protected function setUp(): void {
        parent::setUp();
        $this->onionVendor = new OnionVendor();
    }

    protected function tearDown(): void {
        parent::tearDown();
        $this->onionVendor = null;
    }
}
