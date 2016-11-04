<?php
namespace AlbertMorenoDEV\KataChess\Components;

use AlbertMorenoDEV\KataChess\Components\Pieces\iPiece;

interface iSquare
{
    public function setPiece(iPiece $piece);
    public function getPiece(): iPiece;
}