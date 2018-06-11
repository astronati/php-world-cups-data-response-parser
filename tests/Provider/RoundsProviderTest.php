<?php

namespace Tests\Provider;

use PHPUnit\Framework\TestCase;
use WCDRP\Finder\RoundFinder;
use WCDRP\Provider\RoundsProvider;

class RoundsProviderTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [
            [
              ['num_match' => 1, 'start_time' => '2018-06-17T16:00:00.000Z'],
              ['num_match' => 2, 'start_time' => '2018-06-17T17:00:00.000Z'],
              ['num_match' => 17, 'start_time' => '2018-07-17T16:00:00.000Z'],
            ],
            2,
            '2018-06-17T16:00:00+00:00'
          ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param int $expectedRoundsCount
     * @param string $expectedFirstMatchDate
     */
    public function testProvideRounds($apiResponse, $expectedRoundsCount, $expectedFirstMatchDate)
    {
        $provider = new RoundsProvider(new RoundFinder());
        $rounds = $provider->provideRounds($apiResponse);
        $this->assertSame($expectedRoundsCount, count($rounds));
        $this->assertSame($expectedFirstMatchDate, $rounds[0]->getFirstMatchDate());
    }
}
