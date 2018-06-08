<?php

namespace WCDRP\Provider;

use WCDRP\Finder\RoundFinder;
use WCDRP\Model\RoundModel;

class RoundsProvider
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
     * @return RoundModel[]
     */
    public function provideRounds(array $apiResponse): array
    {
        $rounds = [];
        foreach ($apiResponse as $data) {
            $round = new RoundModel($this->roundFinder->findRoundNumber($data['num_match']), $data['start_time']);
            if ($this->roundFinder->findByNumber($round->getNumber(), $rounds) === null) {
                $rounds[] = $round;
            }
            else {
                $this->roundFinder->findByNumber($round->getNumber(), $rounds)->addMatchDate($round->getFirstMatchDate());
            }
        }
        return $rounds;
    }
}
