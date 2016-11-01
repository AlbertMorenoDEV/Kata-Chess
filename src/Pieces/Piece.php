<?php
namespace AlbertMorenoDEV\KataChess\Pieces;

use AlbertMorenoDEV\KataChess\iPlayer;

abstract class Piece
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