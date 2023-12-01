<?php

namespace SandroRuefenacht\CodingbuddiesAdvent2023\day01;
class PhoneNumberSearchManager {
    /**
     * @param array<int, string> $phoneNumbers
     */
    public function __construct(protected array $phoneNumbers) {}

    public function findSolution(\DateTimeImmutable $dateTime): int {
        $dateSum = $this->getSumOfDate($dateTime);

        $phoneNumber = $this->getByPosition($dateSum);
        return $this->getSignificantPart($phoneNumber);
    }

    public function getSumOfDate(\DateTimeImmutable $dateTime): int {
        $numbers = explode('.', $dateTime->format('d.m.Y'));
        $dateSum = 0;
        foreach($numbers as $numberString) {
            if(!is_numeric($numberString)) {
                throw new \RuntimeException('String is not number');
            }
            $dateSum += $numberString;
        }
        return $dateSum;
    }

    public function getSignificantPart(string $phoneNumber): int {
        $significantNumber = substr($phoneNumber, -2);
        return (int) $significantNumber;
    }

    public function getByPosition(int $position): string {
        return $this->phoneNumbers[$position - 1];
    }
}
