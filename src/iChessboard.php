<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\iPiece;

interface iChessboard
{
    public function getSquares() : array;
    public function setPieceOnSquare($x, $y, iPiece $piece);
}