<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use AlbertMorenoDEV\KataChess\Game;
use AlbertMorenoDEV\KataChess\iSquare;
use AlbertMorenoDEV\KataChess\Pieces\Colors\Black;
use AlbertMorenoDEV\KataChess\Pieces\Colors\White;
use AlbertMorenoDEV\KataChess\Player;
use PHPUnit\Framework\TestCase;

final class ChessTest extends TestCase
{
    /** @var $game Game */
    private $game;

    protected function setUp()
    {
        $this->game = new Game(new Chessboard(), new Player('A', new White()), new Player('B', new Black()));
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
}