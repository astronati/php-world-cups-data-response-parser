<?php

namespace WCDRP\Model;

class RoundModel
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var string[]
     */
    private $dates = [];

    /**
     * @param int $number
     * @param string $date
     */
    public function __construct($number, $date)
    {
        $this->number = $number;
        $this->addMatchDate($date);
    }

    /**
     * @param string $date
     */
    public function addMatchDate($date)
    {
        $this->dates[] = $date;
        asort($this->dates);
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getFirstMatchDate(): string
    {
        return $this->dates[0];
    }

    /**
     * @return string
     */
    public function getLastMatchDate(): string
    {
        return $this->dates[count($this->dates) - 1];
    }
}
