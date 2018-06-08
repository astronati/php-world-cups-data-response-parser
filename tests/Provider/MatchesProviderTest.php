<?php

namespace Tests\Provider;

use PHPUnit\Framework\TestCase;
use WCDRP\Finder\RoundFinder;
use WCDRP\Provider\MatchesProvider;

class MatchesProviderTest extends TestCase
{
    private function getRoundInstances()
    {
        $roundNumbers = [1,2,3];
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
          [
            [
              ['num_match' => 1, 'start_time' => '2018-06-17T16:00:00.000Z', 'home_team' => ['name' => ['full' => 'Brazil']], 'visitant_team' => ['name' => ['full' => 'Morocco']]],
              ['num_match' => 2, 'start_time' => '2018-06-17T17:00:00.000Z', 'home_team' => ['name' => ['full' => 'England']], 'visitant_team' => ['name' => ['full' => 'France']]],
              ['num_match' => 17, 'start_time' => '2018-07-17T16:00:00.000Z', 'home_team' => ['name' => ['full' => 'Germany']], 'visitant_team' => ['name' => ['full' => 'Colombia']]],
            ],
            3
          ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param int $expectedRoundsCount
     */
    public function testProvideMatches($apiResponse, $expectedRoundsCount)
    {
        $provider = new MatchesProvider(new RoundFinder());
        $this->assertSame($expectedRoundsCount, count($provider->provideMatches($apiResponse, $this->getRoundInstances())));
    }
}
