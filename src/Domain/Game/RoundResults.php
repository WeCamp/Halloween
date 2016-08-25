<?php

namespace Halloween\TrickOrTreat\Domain\Game;

class RoundResults
{
    private $playerOneResult;
    private $playerTwoResult;

    private function __construct($playerOneResult, $playerTwoResult)
    {
        $this->playerOneResult = $playerOneResult;
        $this->playerTwoResult = $playerTwoResult;
    }

    public static function withResults($playerOneResult, $playerTwoResult)
    {
        return new self($playerOneResult, $playerTwoResult);
    }

    public function playerOneResult()
    {
       return $this->playerOneResult;
    }

    public function playerTwoResult()
    {
        return $this->playerTwoResult;
    }

}
