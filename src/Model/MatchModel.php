<?php

namespace WCDRP\Model;

class MatchModel
{
    /**
     * @var string
     */
    private $date;

    /**
     * @var TeamModel
     */
    private $homeTeam;

    /**
     * @var TeamModel
     */
    private $awayTeam;

    /**
     * @var RoundModel|null
     */
    private $round;

    /**
     * @param string $date
     * @param TeamModel $homeTeam
     * @param TeamModel $awayTeam
     * @param RoundModel|null $round
     */
    public function __construct(string $date, TeamModel $homeTeam, TeamModel $awayTeam, ?RoundModel $round)
    {
        $this->date = $date;
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->round = $round;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return TeamModel
     */
    public function getHomeTeam(): TeamModel
    {
        return $this->homeTeam;
    }

    /**
     * @return TeamModel
     */
    public function getAwayTeam(): TeamModel
    {
        return $this->awayTeam;
    }

    /**
     * @return RoundModel|null
     */
    public function getRound(): ?RoundModel
    {
        return $this->round;
    }
}
