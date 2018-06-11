<?php

namespace WCDRP\Response;

use WCDRP\Finder\RoundFinder;
use WCDRP\Provider\MatchesProvider;
use WCDRP\Provider\RoundsProvider;

class ResponseParser
{
    /**
     * @param array $apiResponse The response from the API
     * @return Response
     */
    public static function create(array $apiResponse): Response
    {
        $roundsProvider = new RoundsProvider(new RoundFinder());
        $rounds = $roundsProvider->provideRounds($apiResponse);

        $matchesProvider = new MatchesProvider(new RoundFinder());
        $matches = $matchesProvider->provideMatches($apiResponse, $rounds);

        return new Response($matches, $rounds);
    }
}
