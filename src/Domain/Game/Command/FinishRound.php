<?php

namespace Halloween\TrickOrTreat\Domain\Game\Command;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class FinishRound extends Command implements PayloadConstructable
{
    use PayloadTrait;

    /**
     * @param GameId $gameId
     * @param bool   $playerOneResult
     * @param bool   $playerTwoResult
     *
     * @return FinishRound
     */
    public static function withPlayers(GameId $gameId, $playerOneResult, $playerTwoResult)
    {
        return new self(
            [
                'gameId'          => $gameId->toString(),
                'playerOneResult' => (bool)$playerOneResult,
                'playerTwoResult' => (bool)$playerTwoResult,
            ]
        );
    }

    /**
     * @return GameId
     */
    public function gameId()
    {
        return GameId::fromString($this->payload['gameId']);
    }

    /**
     * @return string
     */
    public function playerOneResult()
    {
        return $this->payload['playerOneResult'];
    }

    /**
     * @return string
     */
    public function playerTwoResult()
    {
        return $this->payload['playerTwoResult'];
    }
}
