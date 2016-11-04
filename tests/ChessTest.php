<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use AlbertMorenoDEV\KataChess\Game;
use AlbertMorenoDEV\KataChess\Components\iSquare;
use AlbertMorenoDEV\KataChess\Components\Pieces\Bishop;
use AlbertMorenoDEV\KataChess\Components\Pieces\Colors\Black;
use AlbertMorenoDEV\KataChess\Components\Pieces\Colors\White;
use AlbertMorenoDEV\KataChess\Components\Pieces\King;
use AlbertMorenoDEV\KataChess\Pieces\Knight;
use AlbertMorenoDEV\KataChess\Components\Pieces\Pawn;
use AlbertMorenoDEV\KataChess\Components\Pieces\Queen;
use AlbertMorenoDEV\KataChess\Components\Pieces\Rook;
use AlbertMorenoDEV\KataChess\Player;
use PHPUnit\Framework\TestCase;

final class ChessTest extends TestCase
{
    /** @var $game Game */
    private $game;

    /** @var $playerA Player */
    private $playerA;

    /** @var $playerB Player */
    private $playerB;

    protected function setUp()
    {
        $this->playerA = new Player('A', new White());
        $this->playerB = new Player('B', new Black());
        $this->game = new Game(new Chessboard(), $this->playerA, $this->playerB);
    }

    /** @test */
    public function mustBeOneChessboard()
    {
        $this->assertInstanceOf(Chessboard::class, $this->game->getChessboard());
    }

    /** @test */
    public function eightByEightSquares()
    {
        $squares = $this->game->getChessboard()->getSquares();
        $this->assertTrue(isset($squares['a']));
        $this->assertTrue(isset($squares['a'][1]));
        $this->assertTrue(isset($squares['h']));
        $this->assertTrue(isset($squares['h'][8]));
    }

    /** @test */
    public function mustBeTwoPlayers()
    {
        $this->assertInstanceOf(Player::class, $this->game->getPlayerA());
        $this->assertInstanceOf(Player::class, $this->game->getPlayerB());
    }

    /** @test */
    public function mustBeEightPiecesOfEachColor()
    {
        $whiteTotal = 0;
        $blackTotal = 0;

        $this->game->getChessboard()->walkAllSquares(function (iSquare $square) use (&$whiteTotal, &$blackTotal) {
            if ($square->isSet()) {
                if ($square->getPiece()->getPlayer()->getColor() instanceof White) {
                    $whiteTotal++;
                } elseif ($square->getPiece()->getPlayer()->getColor() instanceof Black) {
                    $blackTotal++;
                }
            }
        });

        $this->assertEquals(16, $whiteTotal);
        $this->assertEquals(16, $blackTotal);
    }

    /** @test */
    public function eachPlayerMustHaveSixteenPieces()
    {
        $playerATotal = 0;
        $playerBTotal = 0;

        $this->game->getChessboard()->walkAllSquares(function (iSquare $square) use (&$playerATotal, &$playerBTotal) {
            if ($square->isSet()) {
                if ($square->getPiece()->getPlayer() === $this->playerA) {
                    $playerATotal++;
                } elseif ($square->getPiece()->getPlayer() === $this->playerB) {
                    $playerBTotal++;
                }
            }
        });

        $this->assertEquals(16, $playerATotal);
        $this->assertEquals(16, $playerBTotal);
    }

    /** @test */
    public function checkPiecesType()
    {
        $kingTotalA = 0;
        $queenTotalA = 0;
        $rookTotalA = 0;
        $knightTotalA = 0;
        $bishopTotalA = 0;
        $pawnTotalA = 0;
        $kingTotalB = 0;
        $queenTotalB = 0;
        $rookTotalB = 0;
        $knightTotalB = 0;
        $bishopTotalB = 0;
        $pawnTotalB = 0;

        $this->game->getChessboard()->walkAllSquares(function (iSquare $square) use (
            &$kingTotalA, &$queenTotalA, &$rookTotalA, &$knightTotalA, &$bishopTotalA, &$pawnTotalA,
            &$kingTotalB, &$queenTotalB, &$rookTotalB, &$knightTotalB, &$bishopTotalB, &$pawnTotalB
        ) {
            if ($square->isSet()) {
                if ($square->getPiece()->getPlayer() === $this->playerA) {
                    if ($square->getPiece() instanceof King) {
                        $kingTotalA++;
                    } elseif ($square->getPiece() instanceof Queen) {
                        $queenTotalA++;
                    } elseif ($square->getPiece() instanceof Rook) {
                        $rookTotalA++;
                    } elseif ($square->getPiece() instanceof Knight) {
                        $knightTotalA++;
                    } elseif ($square->getPiece() instanceof Bishop) {
                        $bishopTotalA++;
                    } elseif ($square->getPiece() instanceof Pawn) {
                        $pawnTotalA++;
                    }
                } elseif ($square->getPiece()->getPlayer() === $this->playerB) {
                    if ($square->getPiece() instanceof King) {
                        $kingTotalB++;
                    } elseif ($square->getPiece() instanceof Queen) {
                        $queenTotalB++;
                    } elseif ($square->getPiece() instanceof Rook) {
                        $rookTotalB++;
                    } elseif ($square->getPiece() instanceof Knight) {
                        $knightTotalB++;
                    } elseif ($square->getPiece() instanceof Bishop) {
                        $bishopTotalB++;
                    } elseif ($square->getPiece() instanceof Pawn) {
                        $pawnTotalB++;
                    }
                }
            }
        });

        $this->assertEquals(1, $kingTotalA, 'Must be one king for player A.');
        $this->assertEquals(1, $queenTotalA, 'Must be one queen for player A.');
        $this->assertEquals(2, $rookTotalA, 'Must be two rooks for player A.');
        $this->assertEquals(2, $knightTotalA, 'Must be two knights for player A.');
        $this->assertEquals(2, $bishopTotalA, 'Must be two bishops for player A.');
        $this->assertEquals(8, $pawnTotalA, 'Must be eight pawns for player A.');
        $this->assertEquals(1, $kingTotalB, 'Must be one king for player B.');
        $this->assertEquals(1, $queenTotalB, 'Must be one queen for player B.');
        $this->assertEquals(2, $rookTotalB, 'Must be two rooks for player B.');
        $this->assertEquals(2, $knightTotalB, 'Must be two knights for player B.');
        $this->assertEquals(2, $bishopTotalB, 'Must be two bishops for player B.');
        $this->assertEquals(8, $pawnTotalB, 'Must be eight pawns for player B.');
    }
}