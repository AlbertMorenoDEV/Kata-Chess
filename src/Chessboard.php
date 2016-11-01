<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\iPiece;

class Chessboard implements iChessboard
{
    private $squares = [];
    
    public function __construct()
    {
        $this->initialize();
    }

    public function getSquares() : array
    {
        return $this->squares;
    }

    public function setPieceOnSquare($x, $y, iPiece $piece)
    {
        $this->getSquare($x, $y)->setPiece($piece);
    }

    public function getSquare($x, $y) : iSquare
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
}