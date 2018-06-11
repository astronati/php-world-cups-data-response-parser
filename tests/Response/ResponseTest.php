<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WCDRP\Response\Response;

class ResponseTest extends TestCase
{
    public function testGetMatches()
    {
        $response = new Response([], []);
        $this->assertEquals([], $response->getMatches());
    }

    public function testGetFirstMatchDate()
    {
        $response = new Response([], []);
        $this->assertEquals([], $response->getMatches());
    }
}
