<?php
namespace AlbertMorenoDEV\KataChess\Components;

use AlbertMorenoDEV\KataChess\Components\Pieces\iPiece;
use AlbertMorenoDEV\KataChess\ValueObjects\Position;

interface iChessboard
{
    public function getSquares() : array;
    public function setPieceOnSquare(Position $position, iPiece $piece);
    public function isEmpty(Position $position) : bool;
}