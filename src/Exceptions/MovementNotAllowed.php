<?php
namespace AlbertMorenoDEV\KataChess\Exceptions;

class MovementNotAllowed extends \Exception
{
    public static function thewSquareIsNotEmpty()
    {
        return new self('The square is not empty.');
    }
}