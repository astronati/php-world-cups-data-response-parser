<?php

namespace Tests\Finder;

use PHPUnit\Framework\TestCase;
use WCDRP\Finder\RoundFinder;

class RoundFinderTest extends TestCase
{
    private function getRoundInstances($roundNumbers)
    {
        $rounds = [];
        foreach ($roundNumbers as $round) {
            $rounds[] = $this->getRoundInstance($round);
        }
        return $rounds;
    }

    private function getRoundInstance($round)
    {
        $instance = $this->getMockBuilder('WCDRP\Model\RoundModel')
          ->setMethods(['getNumber'])
          ->disableOriginalConstructor()
          ->getMock();
        $instance->method('getNumber')->willReturn($round);
        return $instance;
    }

    public function dataProvider()
    {
        return [
          [1, 1],
          [15, 1],
          [16, 1],
          [17, 2],
          [31, 2],
          [32, 2],
          [33, 3],
          [47, 3],
          [48, 3],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $matchNumber
     * @param int $roundNumber
     */
    public function testFindRoundNumber($matchNumber, $roundNumber)
    {
        $roundFinder = new RoundFinder();
        $this->assertEquals($roundNumber, $roundFinder->findRoundNumber($matchNumber));
    }

    public function roundsDataProvider()
    {
        return [
          [[2, 4, 6, 8], 6, 6],
          [[2, 4, 6, 8], 10, null],
        ];
    }

    /**
     * @dataProvider roundsDataProvider
     * @param int[] $roundNumbers
     * @param int $number
     * @param int|null $expectedNumber
     */
    public function testFindRoundByNumber($roundNumbers, $number, $expectedNumber)
    {
        $rounds = $this->getRoundInstances($roundNumbers);
        $roundFinder = new RoundFinder();
        if ($expectedNumber === null) {
            $this->assertNull($roundFinder->findByNumber($number, $rounds));
        }
        else {
            $this->assertEquals($expectedNumber, $roundFinder->findByNumber($number, $rounds)->getNumber());
        }
    }
}
