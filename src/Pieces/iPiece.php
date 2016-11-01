<?php
namespace AlbertMorenoDEV\KataChess\Pieces;

use AlbertMorenoDEV\KataChess\iPlayer;

interface iPiece
{
    public function getPlayer(): iPlayer;
}