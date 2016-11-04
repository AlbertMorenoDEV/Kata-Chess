<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Components\Pieces\iPiece;

interface iChessboard
{
    public function getSquares() : array;
    public function setPieceOnSquare($x, $y, iPiece $piece);
}