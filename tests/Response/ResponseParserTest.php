<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WCDRP\Response\ResponseParser;

class ResponseParserTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [
            [
              ['num_match' => 1, 'start_time' => '2018-06-17T16:00:00.000Z', 'home_team' => ['name' => ['full' => 'Brazil']], 'visitant_team' => ['name' => ['full' => 'Morocco']]],
              ['num_match' => 2, 'start_time' => '2018-06-17T17:00:00.000Z', 'home_team' => ['name' => ['full' => 'England']], 'visitant_team' => ['name' => ['full' => 'France']]],
              ['num_match' => 17, 'start_time' => '2018-07-17T16:00:00.000Z', 'home_team' => ['name' => ['full' => 'Germany']], 'visitant_team' => ['name' => ['full' => 'Colombia']]],
            ],
            'Brazil',
            '2018-06-17T17:00:00+00:00'
          ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param string $expectedName
     * @param string $expectedLastMatchDate
     */
    public function testProvideMatches($apiResponse, $expectedName, $expectedLastMatchDate)
    {
        $result = ResponseParser::create($apiResponse);
        $this->assertEquals($expectedName, $result->getMatches()[0]->getHomeTeam()->getName());
        $this->assertEquals($expectedLastMatchDate, $result->getMatches()[0]->getRound()->getLastMatchDate());
        $this->assertEquals($expectedLastMatchDate, $result->getRounds()[0]->getLastMatchDate());
    }
}
