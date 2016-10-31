<?php
namespace AlbertMorenoDEV\KataChess;

class Chessboard
{
    private $squares = [];
    
    public function __construct()
    {
        $this->initialize();
    }

    public function getSquares()
    {
        return $this->squares;
    }

    private function initialize()
    {
        for ($x = 'a'; $x <= 'h'; $x++) {
            $this->squares[$x] = [];
            for ($y = 1; $y <= 8; $y++) {
                $this->squares[$x][$y] = new Square($x, $y);
            }
        }
    }
}