<?php
namespace AlbertMorenoDEV\KataChess\Components\Pieces;

use AlbertMorenoDEV\KataChess\Components\iPlayer;

interface iPiece
{
    public function getPlayer(): iPlayer;
}