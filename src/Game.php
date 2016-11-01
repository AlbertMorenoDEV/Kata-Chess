<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Pieces\Bishop;
use AlbertMorenoDEV\KataChess\Pieces\King;
use AlbertMorenoDEV\KataChess\Pieces\Knight;
use AlbertMorenoDEV\KataChess\Pieces\Pawn;
use AlbertMorenoDEV\KataChess\Pieces\Queen;
use AlbertMorenoDEV\KataChess\Pieces\Rook;

class Game
{
    /** @var $chessboard Chessboard */
    private $chessboard;

    /** @var $playerA Player */
    private $playerA;

    /** @var $playerA Player */
    private $playerB;

    public function __construct(iChessboard $chessboard, iPlayer $playerA, iPlayer $playerB)
    {
        $this->chessboard = $chessboard;
        $this->playerA = $playerA;
        $this->playerB = $playerB;

        $this->initializePieces();
    }

    private function initializePieces()
    {
        $this->chessboard->setPieceOnSquare('a', 1, new Rook($this->playerA));
        $this->chessboard->setPieceOnSquare('b', 1, new Knight($this->playerA));
        $this->chessboard->setPieceOnSquare('c', 1, new Bishop($this->playerA));
        $this->chessboard->setPieceOnSquare('d', 1, new Queen($this->playerA));
        $this->chessboard->setPieceOnSquare('e', 1, new King($this->playerA));
        $this->chessboard->setPieceOnSquare('f', 1, new Bishop($this->playerA));
        $this->chessboard->setPieceOnSquare('g', 1, new Knight($this->playerA));
        $this->chessboard->setPieceOnSquare('h', 1, new Rook($this->playerA));
        $this->chessboard->setPieceOnSquare('a', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('b', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('c', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('d', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('e', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('f', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('g', 2, new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare('h', 2, new Pawn($this->playerA));

        $this->chessboard->setPieceOnSquare('a', 8, new Rook($this->playerB));
        $this->chessboard->setPieceOnSquare('b', 8, new Knight($this->playerB));
        $this->chessboard->setPieceOnSquare('c', 8, new Bishop($this->playerB));
        $this->chessboard->setPieceOnSquare('d', 8, new Queen($this->playerB));
        $this->chessboard->setPieceOnSquare('e', 8, new King($this->playerB));
        $this->chessboard->setPieceOnSquare('f', 8, new Bishop($this->playerB));
        $this->chessboard->setPieceOnSquare('g', 8, new Knight($this->playerB));
        $this->chessboard->setPieceOnSquare('h', 8, new Rook($this->playerB));
        $this->chessboard->setPieceOnSquare('a', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('b', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('c', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('d', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('e', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('f', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('g', 7, new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare('h', 7, new Pawn($this->playerB));
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