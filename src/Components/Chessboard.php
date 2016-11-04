<?php
namespace AlbertMorenoDEV\KataChess\Components;

use AlbertMorenoDEV\KataChess\Components\Pieces\iPiece;
use AlbertMorenoDEV\KataChess\ValueObjects\Position;

class Chessboard implements iChessboard
{
    private $squares = [];
    
    public function __construct()
    {
        $this->initialize();
    }

    public function getSquares(): array
    {
        return $this->squares;
    }

    public function setPieceOnSquare(Position $position, iPiece $piece)
    {
        $this->getSquare($position->getX(), $position->getY())->setPiece($piece);
    }

    public function emptySquare(Position $position)
    {
        $this->getSquare($position->getX(), $position->getY())->empty();
    }

    public function getPiece(Position $position): iPiece
    {
        return $this->getSquare($position->getX(), $position->getY())->getPiece();
    }

    public function getSquare($x, $y): iSquare
    {
        return $this->squares[$x][$y];
    }

    public function walkAllPositions(callable $callback)
    {
        for ($x = 'a'; $x <= 'h'; $x++) {
            for ($y = 1; $y <= 8; $y++) {
                call_user_func($callback, $x, $y);
            }
        }
    }

    public function walkAllSquares(callable $callback)
    {
        $this->walkAllPositions(function ($x, $y) use (&$callback) {
            call_user_func($callback, $this->getSquare($x, $y));
        });
    }

    private function initialize()
    {
        $this->walkAllPositions(function ($x, $y) {
            if (!isset($this->squares[$x])) {
                $this->squares[$x] = [];
            }
            $this->squares[$x][$y] = new Square($x, $y);
        });
    }

    public function isEmpty(Position $position): bool
    {
        return $this->getSquare($position->getX(), $position->getY())->isEmpty();
    }
}