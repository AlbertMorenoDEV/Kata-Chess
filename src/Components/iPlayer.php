<?php
namespace AlbertMorenoDEV\KataChess\Components;

use AlbertMorenoDEV\KataChess\Components\Pieces\Colors\iColor;

interface iPlayer
{
    public function __construct(string $name, iColor $color);
    public function getName(): string;
    public function getColor(): iColor;
}