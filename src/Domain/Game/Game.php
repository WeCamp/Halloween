<?php

namespace Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\GameWasInitialised;
use Prooph\EventSourcing\AggregateRoot;

final class Game extends AggregateRoot
{
    /**
     * @var GameId
     */
    private $gameId;
    /**
     * @var Player
     */
    private $playerOne;

    /**
     * @var Player
     */
    private $playerTwo;

    /**
     * @return string
     */
    protected function aggregateId()
    {
        return $this->gameId->toString();
    }

    /**
     * @param GameId $gameId
     * @param        $playerOne
     * @param        $playerTwo
     *
     * @return Game
     */
    public static function initializeWithPlayerNames(GameId $gameId, $playerOne, $playerTwo)
    {
        $game = new self;
        $game->recordThat(GameWasInitialised::withPlayers($gameId, new Player($playerOne), new Player($playerTwo)));

        return $game;
    }

    /**
     * @param GameWasInitialised $event
     */
    protected function whenGameWasInitialised(GameWasInitialised $event)
    {
        $this->gameId    = $event->aggregateId();
        $this->playerOne = $event->playerOne();
        $this->playerTwo = $event->playerTwo();
    }
}