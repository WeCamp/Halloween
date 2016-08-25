<?php

namespace Halloween\TrickOrTreat\Projection\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\CurrentRoundHasBeenFinished;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithADraw;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithWinner;
use Halloween\TrickOrTreat\Domain\Game\Event\GameWasInitialised;
use MongoClient;

/**
 * Class GameProjector
  */
final class GameProjector
{
    /**
     * @var \MongoCollection $collection
     */
    private $collection;

    public function __construct(MongoClient $client)
    {
        $db = $client->trick_or_treat;
        $this->collection = $db->game;
    }

    /**
     * @param GameWasInitialised $event
     */
    public function onGameWasInitialised(GameWasInitialised $event)
    {
        $document = [
            'gameId' => $event->gameId()->toString(),
            'players' => [
                'playerOne' => $event->playerOne()->name(),
                'playerTwo' => $event->playerTwo()->name()
            ],
            'finishedRound' => 0,
            'status' => 'unfinished'
        ];
        $this->collection->insert($document);
    }

    /**
     * @param CurrentRoundHasBeenFinished $event
     */
    public function onCurrentRoundHasBeenFinished(CurrentRoundHasBeenFinished $event)
    {
        $this->collection->update(
            ['gameId' => $event->gameId()->toString()],
            ['$set' => [
                'finishedRound' => $event->roundNumber()
                ]
            ]
        );
    }

    /**
     * @param GameHasFinishedWithADraw $event
     */
    public function onGameHasFinishedWithADraw(GameHasFinishedWithADraw $event)
    {
        $this->collection->update(
            ['gameId' => $event->gameId()->toString()],
            ['$set' => [
                'finishedRound' => $event->roundNumber(),
                'status' => 'draw'
                ]
            ]
        );
    }

    /**
     * @param GameHasFinishedWithWinner $event
     */
    public function onGameHasFinishedWithWinner(GameHasFinishedWithWinner $event)
    {
        $this->collection->update(
            ['gameId' => $event->gameId()->toString()],
            ['$set' => [
                'finishedRound' => $event->roundNumber(),
                'status' => 'winner'
                ]
            ]
        );
    }
}
