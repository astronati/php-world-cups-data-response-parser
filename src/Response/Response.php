<?php

namespace WCDRP\Response;

use WCDRP\Model\MatchModel;
use WCDRP\Model\RoundModel;

class Response
{
    /**
     * @var MatchModel[]
     */
    private $matches;

    /**
     * @var RoundModel[]
     */
    private $rounds;

    /**
     * @param MatchModel[] $matches
     * @param RoundModel[] $rounds
     */
    public function __construct(array $matches, array $rounds)
    {
        $this->matches = $matches;
        $this->rounds = $rounds;
    }

    /**
     * @return MatchModel[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @return RoundModel[]
     */
    public function getRounds(): array
    {
        return $this->rounds;
    }
}
