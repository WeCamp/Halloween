<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\Player;
use Prooph\EventSourcing\AggregateChanged;

final class GameWasInitialised extends AggregateChanged
{
    /**
     * @param GameId $gameId
     * @param Player $playerOne
     * @param Player $playerTwo
     *
     * @return static
     */
    public static function withPlayers(GameId $gameId, Player $playerOne, Player $playerTwo)
    {
        return self::occur($gameId->toString(), ['playerOne' => $playerOne->name(), 'playerTwo' => $playerTwo->name()]);
    }

    /**
     * @return GameId
     */
    public function gameId()
    {
        return GameId::fromString($this->aggregateId());
    }

    /**
     * @return Player
     */
    public function playerOne()
    {
        return new Player($this->payload['playerOne']);
    }

    /**
     * @return Player
     */
    public function playerTwo()
    {
        return new Player($this->payload['playerTwo']);
    }
}