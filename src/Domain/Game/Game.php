<?php

namespace Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\CurrentRoundHasBeenFinished;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinished;
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
     *  @var int
     */
    private $roundNumber = 0;

    /**
     * boolean
     */
    private $playerOneAte = false;

    /**
     * boolean
     */
    private $playerTwoAte = false;

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

    public function start()
    {
        $this->recordThat(GameWasStarted::withId($this->gameId));
    }

    public function playerOneAteMeal()
    {
        $this->recordThat(PlayerOneHasEatenHisMeal::inRound($this->gameId, $this->roundNumber));
    }

    public function playerTwoAteMeal()
    {
        $this->recordThat(PlayerTwoHasEatenHisMeal::inRound($this->gameId, $this->roundNumber));
    }

    /**
     * @param GameWasInitialised $event
     */
    protected function whenGameWasInitialised(GameWasInitialised $event)
    {
        $this->gameId    = $event->gameId();
        $this->playerOne = $event->playerOne();
        $this->playerTwo = $event->playerTwo();
    }

    /**
     * @param GameWasStarted $event
     */
    protected function whenGameWasStarted(GameWasStarted $event)
    {
        $this->roundNumber = $this->roundNumber + 1;
    }

    /**
     * @param PlayerOneHasEatenHisMeal $event
     */
    protected function whenPlayerOneHasEatenHisMeal(PlayerOneHasEatenHisMeal $event)
    {
        $this->playerOneAte = true;
    }

    /**
     * @param PlayerTwoHasEatenHisMeal $event
     */
    protected function whenPlayerTwoHasEatenHisMeal(PlayerTwoHasEatenHisMeal $event)
    {
        $this->playerTwoAte = true;
    }


    public function finishRound()
    {
        if(!$this->playerOneAte || !$this->playerTwoAte){
            throw new \LogicException('Not all players ate their meals');
        }

        $this->recordThat(CurrentRoundHasBeenFinished::withId($this->gameId, $this->roundNumber));
    }

    protected function whenCurrentRoundHasBeenFinished(CurrentRoundHasBeenFinished $event)
    {
        $this->roundNumber = $this->roundNumber + 1;
        $this->playerOneAte = false;
        $this->playerTwoAte = false;
    }

    public function playerOneQuits()
    {
        $this->recordThat(GameHasFinished::withWinnerInRound($this->gameId, $this->playerTwo, $this->roundNumber));
    }

    protected function whenGameHasFinished(GameHasFinished $event)
    {


    }

    public function playerTwoQuits()
    {
        $this->recordThat(GameHasFinished::withWinnerInRound($this->gameId, $this->playerOne, $this->roundNumber));
    }
}