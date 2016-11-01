<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\iPiece;

interface iSquare
{
    public function setPiece(iPiece $piece);
    public function getPiece(): iPiece;
}