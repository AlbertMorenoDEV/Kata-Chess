<?php
namespace AlbertMorenoDEV\KataChess\Exceptions;

class InvalidPosition extends \Exception
{
    public static function isOutOfLimits()
    {
        return new self('The position is out of limits.');
    }
}