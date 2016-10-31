<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use AlbertMorenoDEV\KataChess\Game;
use AlbertMorenoDEV\KataChess\Player;
use PHPUnit\Framework\TestCase;

final class ChessTest extends TestCase
{
    /** @var $game Game */
    private $game;

    protected function setUp()
    {
        $this->game = new Game(new Chessboard(), new Player('A'), new Player('B'));
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
}