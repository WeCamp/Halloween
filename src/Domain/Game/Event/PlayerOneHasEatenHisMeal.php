<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\EventSourcing\AggregateChanged;

final class PlayerOneHasEatenHisMeal extends AggregateChanged
{
    /**
     * @param GameId  $gameId
     * @param integer $roundNumber
     *
     * @return static
     */
    public static function inRound(GameId $gameId, $roundNumber)
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

    /**
     * @return integer
     */
    public function roundNumber()
    {
        return $this->payload['roundNumber'];
    }

}