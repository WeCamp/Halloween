<?php

namespace Halloween\TrickOrTreat\Infrastructure\Repository;

use Prooph\EventStore\Aggregate\AggregateRepository;
use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use Halloween\TrickOrTreat\Domain\Game\Game;
use Halloween\TrickOrTreat\Domain\Game\GameId;

/**
 * Class EventStoreAvailableIngredients
 */
final class EventStoreGameRepository extends AggregateRepository implements GameRepository
{
    /**
     * @param Game $game
     * @return void
     */
    public function add(Game $game)
    {
        $this->addAggregateRoot($game);
    }

    /**
     * @param GameId $gameId
     * @return Game
     */
    public function get(GameId $gameId)
    {
        return $this->getAggregateRoot($gameId->toString());
    }
}
