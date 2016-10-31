<?php
namespace AlbertMorenoDEV\KataChess;

class Square
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}