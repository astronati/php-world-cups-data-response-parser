<?php

namespace WCDRP\Provider;

use WCDRP\Finder\RoundFinder;
use WCDRP\Model\MatchModel;
use WCDRP\Model\RoundModel;
use WCDRP\Model\TeamModel;

class MatchesProvider
{
    /**
     * @var RoundFinder
     */
    private $roundFinder;

    public function __construct(RoundFinder $roundFinder)
    {
        $this->roundFinder = $roundFinder;
    }

    /**
     * @param array $apiResponse The response from the API
     * @param RoundModel[] $rounds
     * @return MatchModel[]
     */
    public function provideMatches(array $apiResponse, array $rounds): array
    {
        $matches = [];
        foreach ($apiResponse as $data) {
            $round = $this->roundFinder->findByNumber($this->roundFinder->findRoundNumber($data['num_match']), $rounds);
            $matches[] = new MatchModel(
              str_replace('.000Z', '+00:00', $data['start_time']),
              new TeamModel($data['home_team']['name']['full']),
              new TeamModel($data['visitant_team']['name']['full']),
              $round
            );
        }
        return $matches;
    }
}
