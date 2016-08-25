<?php

namespace Halloween\TrickOrTreat\Domain\Game\Command;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class InitialiseGame extends Command implements PayloadConstructable
{
    use PayloadTrait;

    public static function withPlayers(GameId $gameId, $playerOne, $playerTwo)
    {
        return new self(
            ['gameId' => $gameId->toString(), 'playerOne' => (string)$playerOne, 'playerTwo' => (string)$playerTwo]
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
    public function playerOne()
    {
        return $this->payload['playerOne'];
    }

    /**
     * @return string
     */
    public function playerTwo()
    {
        return $this->payload['playerTwo'];
    }
}
