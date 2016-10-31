<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use PHPUnit\Framework\TestCase;

final class ChessTest extends TestCase
{
    /** @var $chessboard Chessboard */
    private $chessboard;

    protected function setUp()
    {
        $this->chessboard = new Chessboard();
    }

    /** @test */
    public function mustBeOneChessboard()
    {
        $this->assertInstanceOf(Chessboard::class, $this->chessboard);
    }

    /** @test */
    public function eightByEightSquares()
    {
        $squares = $this->chessboard->getSquares();
        $this->assertTrue(isset($squares['a']));
        $this->assertTrue(isset($squares['a'][1]));
        $this->assertTrue(isset($squares['h']));
        $this->assertTrue(isset($squares['h'][8]));
    }

    /** @test */
    public function mustBeTwoPlayers()
    {
        // ToDo
    }
}