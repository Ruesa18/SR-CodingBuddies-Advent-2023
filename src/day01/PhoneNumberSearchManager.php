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
        return array_sum(explode('.', $dateTime->format('d.m.Y')));
    }

    public function getSignificantPart(string $phoneNumber): int {
        return (int) substr($phoneNumber, -2);
    }

    public function getByPosition(int $position): string {
        return $this->phoneNumbers[$position - 1];
    }
}
