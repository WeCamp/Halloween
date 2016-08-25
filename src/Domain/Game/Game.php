<?php

namespace Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\CurrentRoundHasBeenFinished;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithADraw;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithWinner;
use Halloween\TrickOrTreat\Domain\Game\Event\GameWasInitialised;
use Halloween\TrickOrTreat\Domain\Game\Event\GameWasStarted;
use Halloween\TrickOrTreat\Domain\Game\Event\PlayerOneHasEatenHisMeal;
use Halloween\TrickOrTreat\Domain\Game\Event\PlayerTwoHasEatenHisMeal;
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
     * @var int
     */
    private $roundNumber = 0;

    /**
     * @return string
     */
    protected function aggregateId()
    {
        return $this->gameId->toString();
    }

    /**
     * @param GameId $gameId
     * @param string $playerOne
     * @param string $playerTwo
     *
     * @return Game
     */
    public static function initializeWithPlayerNames(GameId $gameId, $playerOne, $playerTwo)
    {
        $game = new self;
        $game->recordThat(GameWasInitialised::withPlayers($gameId, new Player($playerOne), new Player($playerTwo)));

        return $game;
    }

    public function finishRound(RoundResults $roundResults)
    {
        $playerOneResult = $roundResults->playerOneResult();
        $playerTwoResult = $roundResults->playerTwoResult();

        if ($playerOneResult && $playerTwoResult) {
            $this->recordThat(CurrentRoundHasBeenFinished::withId($this->gameId, $this->roundNumber));

            return;
        }

        if (!$playerOneResult && !$playerTwoResult) {
            $this->recordThat(GameHasFinishedWithADraw::inRound($this->gameId, $this->roundNumber));

            return;
        }

        if ($playerOneResult) {
            $this->recordThat(GameHasFinishedWithWinner::inRound($this->gameId, $this->playerOne, $this->roundNumber));

            return;
        }

        $this->recordThat(GameHasFinishedWithWinner::inRound($this->gameId, $this->playerTwo, $this->roundNumber));
    }

    protected function whenGameHasFinishedWithWinner(GameHasFinishedWithWinner $event)
    {
    }


    protected function whenGameHasFinishedWithADraw(GameHasFinishedWithADraw $event)
    {
    }

    /**
     * @param GameWasInitialised $event
     */
    protected function whenGameWasInitialised(GameWasInitialised $event)
    {
        $this->gameId      = $event->gameId();
        $this->playerOne   = $event->playerOne();
        $this->playerTwo   = $event->playerTwo();
        $this->roundNumber = 1;
    }
    
    /**
     * @param CurrentRoundHasBeenFinished $event
     */
    protected function whenCurrentRoundHasBeenFinished(CurrentRoundHasBeenFinished $event)
    {
        $this->roundNumber = $this->roundNumber + 1;
    }
}