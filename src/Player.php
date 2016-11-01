<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\Colors\iColor;

class Player implements iPlayer
{
    private $name;
    private $color;

    public function __construct(string $name, iColor $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return iColor
     */
    public function getColor(): iColor
    {
        return $this->color;
    }
}