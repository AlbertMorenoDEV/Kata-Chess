<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\iPiece;

class Square implements iSquare
{
    private $x;
    private $y;
    private $piece;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setPiece(iPiece $piece)
    {
        if (isset($this->piece)) {
            throw new \Exception('Square already in use.');
        }

        $this->piece = $piece;
    }

    public function isSet(): bool
    {
        return (isset($this->piece));
    }

    public function getPiece(): iPiece
    {
        return $this->piece;
    }
}