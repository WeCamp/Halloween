<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\EventSourcing\AggregateChanged;

final class CurrentRoundHasBeenFinished extends AggregateChanged
{
    public static function withId(GameId $gameId, $roundNumber)
    {
        return self::occur($gameId->toString(), ['roundNumber' => $roundNumber]);
    }

    /**
     * @return GameId
     */
    public function gameId()
    {
        return GameId::fromString($this->aggregateId());
    }

    public function roundNumber()
    {
        return (int) $this->payload['roundNumber'];
    }

}