<?php
namespace AlbertMorenoDEV\KataChess\ValueObjects;

use AlbertMorenoDEV\KataChess\Exceptions\InvalidPosition;

class Position
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->validate($x, $y);

        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    private function validate($x, $y)
    {
        if ($x < 'a' || $x > 'h' || $y < '1' || $y > '8') {
            throw InvalidPosition::isOutOfLimits();
        }
    }
}