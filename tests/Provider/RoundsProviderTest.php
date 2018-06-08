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
            2
          ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param int $expectedRoundsCount
     */
    public function testProvideRounds($apiResponse, $expectedRoundsCount)
    {
        $provider = new RoundsProvider(new RoundFinder());
        $this->assertSame($expectedRoundsCount, count($provider->provideRounds($apiResponse)));
    }
}
