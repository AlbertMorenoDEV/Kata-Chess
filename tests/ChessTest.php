<?php

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
        $this->assertTrue(true);
    }

    /** @test */
    public function mustBeTwoPlayers()
    {
        $this->assertTrue(true);
    }
}