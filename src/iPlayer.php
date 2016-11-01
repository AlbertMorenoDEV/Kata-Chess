<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\Colors\iColor;

interface iPlayer
{
    public function __construct(string $name, iColor $color);
    public function getName(): string;
    public function getColor(): iColor;
}