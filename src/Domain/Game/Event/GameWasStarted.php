<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\EventSourcing\AggregateChanged;

final class GameWasStarted extends AggregateChanged
{
    /**
     * @param GameId $gameId
     *
     * @return static
     */
    public static function withId(GameId $gameId)
    {
        return self::occur($gameId->toString());
    }

    /**
     * @return GameId
     */
    public function gameId()
    {
        return GameId::fromString($this->aggregateId());
    }

}