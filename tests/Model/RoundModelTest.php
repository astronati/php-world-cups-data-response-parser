<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WCDRP\Model\RoundModel;

class RoundModelTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [1, '2017-07-07T00:00:00+02:00'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $number
     * @param string $firstMatchDate
     */
    public function testGetFirstMatchDate($number, $firstMatchDate)
    {
        $roundModel = new RoundModel($number, $firstMatchDate);
        $this->assertSame($firstMatchDate, $roundModel->getFirstMatchDate());
    }

    /**
     * @dataProvider dataProvider
     * @param int $number
     * @param string $firstMatchDate
     */
    public function testGetNumber($number, $firstMatchDate)
    {
        $roundModel = new RoundModel($number, $firstMatchDate);
        $this->assertSame($number, $roundModel->getNumber());
    }

    public function allDataProvider()
    {
        return [
          [1, '2017-07-07T00:00:00+02:00', '2017-08-07T00:00:00+02:00'],
        ];
    }

    /**
     * @dataProvider allDataProvider
     * @param int $number
     * @param string $firstMatchDate
     * @param string $lastMatchDate
     */
    public function testGetLastMatchDate($number, $firstMatchDate, $lastMatchDate)
    {
        $roundModel = new RoundModel($number, $firstMatchDate);
        $roundModel->addMatchDate($lastMatchDate);
        $this->assertSame($lastMatchDate, $roundModel->getLastMatchDate());
    }
}
