<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\Tests\day01;
use PHPUnit\Framework\TestCase;
use SandroRuefenacht\CodingbuddiesAdvent2023\day01\PhoneNumberSearchManager;

class PhoneNumberSearchManagerTest extends TestCase {
    protected ?PhoneNumberSearchManager $phoneNumberSearchManager;

    public static function getTestDatesForSum(): array {
        return [
            [
                'input' => '01.12.2023',
                'expect' => 2036
            ],
            [
                'input' => '01.01.2023',
                'expect' => 2025
            ],
            [
                'input' => '02.03.1995',
                'expect' => 2000
            ]
        ];
    }

    /**
     * @dataProvider getTestDatesForSum
     */
    public function testGetSumOfDate(string $input, int $expect): void {
        $dateTime = \DateTimeImmutable::createFromFormat('d.m.Y', $input);
        $sum = $this->phoneNumberSearchManager->getSumOfDate($dateTime);
        $this->assertEquals($expect, $sum);
    }

    public static function getTestPositionsForPhoneNumbers(): array {
        return [
            [
                'input' => 1,
                'expect' => '0165/1842495'
            ],
            [
                'input' => 2468,
                'expect' => '0174/6802890'
            ],
            [
                'input' => 3000,
                'expect' => '0153/5150701'
            ]
        ];
    }

    /** @dataProvider getTestPositionsForPhoneNumbers */
    public function testGetByPosition(int $input, string $expected): void {
        $phoneNumber = $this->phoneNumberSearchManager->getByPosition($input);

        $this->assertEquals($expected, $phoneNumber);
    }

    public static function getTestPhoneNumbersForSignificantPart(): array {
        return [
            [
                'input' => '0165/1842495',
                'expected' => 95,
            ],
            [
                'input' => '0174/6802890',
                'expected' => 90,
            ],
            [
                'input' => '0153/5150701',
                'expected' => 1,
            ]
        ];
    }

    /** @dataProvider getTestPhoneNumbersForSignificantPart */
    public function testSignificantPart(string $input, int $expected): void {
        $significantPart = $this->phoneNumberSearchManager->getSignificantPart($input);

        $this->assertEquals($expected, $significantPart);
    }

    public function testFindSolution(): void {
        $dateTime = \DateTimeImmutable::createFromFormat('d.m.Y', '01.12.2023');
        $solution = $this->phoneNumberSearchManager->findSolution($dateTime);

        $this->assertIsInt($solution);
        echo "\r\n\r\nDay 01";
        echo sprintf("\r\n\r\nThe solution is: %s\r\n\r\n", $solution);
    }

    /**
     * @throws \JsonException
     */
    protected function setUp(): void {
        parent::setUp();
        $data = file_get_contents('data/01.json');
        $this->phoneNumberSearchManager = new PhoneNumberSearchManager(json_decode($data, false, 512, JSON_THROW_ON_ERROR));
    }

    protected function tearDown(): void {
        parent::tearDown();
        $this->phoneNumberSearchManager = null;
    }
}
