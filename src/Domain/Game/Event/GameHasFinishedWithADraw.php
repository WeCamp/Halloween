<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\Player;
use Prooph\EventSourcing\AggregateChanged;

final class GameHasFinishedWithADraw extends AggregateChanged
{
    /**
     * @param GameId  $gameId
     * @param integer $roundNumber
     *
     * @return static
     */
    public static function inRound(GameId $gameId, $roundNumber)
    {
        return self::occur($gameId->toString(), ['roundNumber' => (int)$roundNumber]);
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
    public function roundNumber()
    {
        return (int)$this->payload['roundNumber'];
    }
}