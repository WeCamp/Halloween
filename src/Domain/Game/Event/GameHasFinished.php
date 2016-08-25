<?php

namespace Halloween\TrickOrTreat\Domain\Game\Event;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\Player;
use Prooph\EventSourcing\AggregateChanged;

final class GameHasFinished extends AggregateChanged
{
    public static function withWinnerInRound(GameId $gameId, Player $player, $roundNumber)
    {
        return self::occur($gameId->toString(), ['winner' => $player->name(), 'rounumber' => $roundNumber]);
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
    public function winner()
    {
        return new Player($this->payload['winner']);
    }

    /**
     * @return Player
     */
    public function roundNumber()
    {
        return $this->payload['roundNumber'];
    }
}