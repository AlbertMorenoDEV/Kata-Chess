<?php
namespace AlbertMorenoDEV\KataChess\Components\Pieces;

use AlbertMorenoDEV\KataChess\Components\iPlayer;

abstract class Piece implements iPiece
{
    private $player;

    public function __construct(iPlayer $player)
    {
        $this->player = $player;
    }

    public function getPlayer(): iPlayer
    {
        return $this->player;
    }
}