<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use AlbertMorenoDEV\KataChess\Game;
use AlbertMorenoDEV\KataChess\iSquare;
use AlbertMorenoDEV\KataChess\Pieces\Bishop;
use AlbertMorenoDEV\KataChess\Pieces\Colors\Black;
use AlbertMorenoDEV\KataChess\Pieces\Colors\White;
use AlbertMorenoDEV\KataChess\Pieces\King;
use AlbertMorenoDEV\KataChess\Pieces\Knight;
use AlbertMorenoDEV\KataChess\Pieces\Pawn;
use AlbertMorenoDEV\KataChess\Pieces\Queen;
use AlbertMorenoDEV\KataChess\Pieces\Rook;
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
        $kingTotal = 0;
        $queenTotal = 0;
        $rookTotal = 0;
        $knightTotal = 0;
        $bishopTotal = 0;
        $pawnTotal = 0;

        $this->game->getChessboard()->walkAllSquares(function (iSquare $square) use (
            &$kingTotal, &$queenTotal, &$rookTotal, &$knightTotal, &$bishopTotal, &$pawnTotal
        ) {
            if ($square->isSet()) {
                if ($square->getPiece()->getPlayer() === $this->playerA) {
                    if ($square->getPiece() instanceof King) {
                        $kingTotal++;
                    } elseif ($square->getPiece() instanceof Queen) {
                        $queenTotal++;
                    } elseif ($square->getPiece() instanceof Rook) {
                        $rookTotal++;
                    } elseif ($square->getPiece() instanceof Knight) {
                        $knightTotal++;
                    } elseif ($square->getPiece() instanceof Bishop) {
                        $bishopTotal++;
                    } elseif ($square->getPiece() instanceof Pawn) {
                        $pawnTotal++;
                    }
                }
            }
        });

        $this->assertEquals(1, $kingTotal, 'Must be one king for player A.');
        $this->assertEquals(1, $queenTotal, 'Must be one queen for player A.');
        $this->assertEquals(2, $rookTotal, 'Must be two rooks for player A.');
        $this->assertEquals(2, $knightTotal, 'Must be two knights for player A.');
        $this->assertEquals(2, $bishopTotal, 'Must be two bishops for player A.');
        $this->assertEquals(8, $pawnTotal, 'Must be eight pawns for player A.');
    }
}