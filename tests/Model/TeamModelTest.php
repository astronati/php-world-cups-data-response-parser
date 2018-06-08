<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WCDRP\Model\TeamModel;

class TeamModelTest extends TestCase
{
    public function dataProvider()
    {
        return [
          ['Juventus'],
          ['Milan'],
          ['Inter'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $name
     */
    public function testGetName($name)
    {
        $teamModel = new TeamModel($name);
        $this->assertSame($name, $teamModel->getName());
    }
}
