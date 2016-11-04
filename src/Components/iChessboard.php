<?php
namespace AlbertMorenoDEV\KataChess\Components;

use AlbertMorenoDEV\KataChess\Components\Pieces\iPiece;

interface iChessboard
{
    public function getSquares() : array;
    public function setPieceOnSquare($x, $y, iPiece $piece);
}