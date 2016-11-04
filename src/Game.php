<?php
namespace AlbertMorenoDEV\KataChess;

use AlbertMorenoDEV\KataChess\Actions\MovePiece;
use AlbertMorenoDEV\KataChess\Components\Chessboard;
use AlbertMorenoDEV\KataChess\Components\iChessboard;
use AlbertMorenoDEV\KataChess\Components\iPlayer;
use AlbertMorenoDEV\KataChess\Components\Pieces\Bishop;
use AlbertMorenoDEV\KataChess\Components\Pieces\King;
use AlbertMorenoDEV\KataChess\Components\Player;
use AlbertMorenoDEV\KataChess\Components\Pieces\Knight;
use AlbertMorenoDEV\KataChess\Components\Pieces\Pawn;
use AlbertMorenoDEV\KataChess\Components\Pieces\Queen;
use AlbertMorenoDEV\KataChess\Components\Pieces\Rook;
use AlbertMorenoDEV\KataChess\Exceptions\MovementNotAllowed;
use AlbertMorenoDEV\KataChess\ValueObjects\Position;

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
        $this->chessboard->setPieceOnSquare(new Position('a', 1), new Rook($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('b', 1), new Knight($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('c', 1), new Bishop($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('d', 1), new Queen($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('e', 1), new King($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('f', 1), new Bishop($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('g', 1), new Knight($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('h', 1), new Rook($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('a', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('b', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('c', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('d', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('e', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('f', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('g', 2), new Pawn($this->playerA));
        $this->chessboard->setPieceOnSquare(new Position('h', 2), new Pawn($this->playerA));

        $this->chessboard->setPieceOnSquare(new Position('a', 8), new Rook($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('b', 8), new Knight($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('c', 8), new Bishop($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('d', 8), new Queen($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('e', 8), new King($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('f', 8), new Bishop($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('g', 8), new Knight($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('h', 8), new Rook($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('a', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('b', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('c', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('d', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('e', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('f', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('g', 7), new Pawn($this->playerB));
        $this->chessboard->setPieceOnSquare(new Position('h', 7), new Pawn($this->playerB));
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

    public function movePiece(Position $originPosition, Position $destinyPosition)
    {
        if (!$this->chessboard->isEmpty($destinyPosition)) {
            throw MovementNotAllowed::thewSquareIsNotEmpty();
        }

        $piece = $this->chessboard->getPiece($originPosition);
        $this->chessboard->emptySquare($originPosition);
        $this->chessboard->setPieceOnSquare($destinyPosition, $piece);
    }
}