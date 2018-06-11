<?php

namespace WCDRP\Finder;

use WCDRP\Model\RoundModel;

class RoundFinder
{
    /**
     * Determines the round number from the match number
     * @param int $matchNumber
     * @return int
     */
    public function findRoundNumber(int $matchNumber): int
    {
        return ceil($matchNumber / 16);
    }

    /**
     * @param int $number
     * @param RoundModel[] $rounds
     * @return RoundModel|null
     */
    public function findByNumber(int $number, array $rounds): ?RoundModel
    {
        foreach ($rounds as $round) {
            if ($round->getNumber() === $number) {
                return $round;
            }
        }
        return null;
    }
}
