<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WCDRP\Model\MatchModel;

class MatchModelTest extends TestCase
{
    private function getTeamInstance()
    {
        $instance = $this->getMockBuilder('WCDRP\Model\TeamModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    private function getRoundInstance()
    {
        $instance = $this->getMockBuilder('WCDRP\Model\RoundModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    public function testGetHomeTeam()
    {
        $homeTeam = $this->getTeamInstance();
        $matchModel = new MatchModel('', $homeTeam, $this->getTeamInstance(), $this->getRoundInstance());
        $this->assertEquals($homeTeam, $matchModel->getHomeTeam());
    }

    public function testGetAwayTeam()
    {
        $awayTeam = $this->getTeamInstance();
        $matchModel = new MatchModel('', $this->getTeamInstance(), $awayTeam, $this->getRoundInstance());
        $this->assertEquals($awayTeam, $matchModel->getAwayTeam());
    }

    public function testGetDate()
    {
        $matchModel = new MatchModel('2018-03-21T00:00:00+02:00', $this->getTeamInstance(), $this->getTeamInstance(), $this->getRoundInstance());
        $this->assertEquals('2018-03-21T00:00:00+02:00', $matchModel->getDate());
    }

    public function testGetRound()
    {
        $round = $this->getRoundInstance();
        $matchModel = new MatchModel('2018-03-21T00:00:00+02:00', $this->getTeamInstance(), $this->getTeamInstance(), $round);
        $this->assertEquals($round, $matchModel->getRound());
    }
}
