<?php

use AlbertMorenoDEV\KataChess\Chessboard;
use PHPUnit\Framework\TestCase;

final class ChessTest extends TestCase
{
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
    public function mustBeTwoPlayers()
    {
        // ToDo
    }
}