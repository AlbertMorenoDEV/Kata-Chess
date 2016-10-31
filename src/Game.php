<?php
namespace AlbertMorenoDEV\KataChess;

class Game
{
    /** @var $chessboard Chessboard */
    private $chessboard;

    /** @var $playerA Player */
    private $playerA;

    /** @var $playerA Player */
    private $playerB;

    public function __construct($chessboard, $playerA, $playerB)
    {
        $this->chessboard = $chessboard;
        $this->playerA = $playerA;
        $this->playerB = $playerB;
    }

    /**
     * @return Chessboard
     */
    public function getChessboard()
    {
        return $this->chessboard;
    }

    /**
     * @return Player
     */
    public function getPlayerA()
    {
        return $this->playerA;
    }

    /**
     * @return Player
     */
    public function getPlayerB()
    {
        return $this->playerB;
    }
}