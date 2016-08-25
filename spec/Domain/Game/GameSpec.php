<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\CurrentRoundHasBeenFinished;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithADraw;
use Halloween\TrickOrTreat\Domain\Game\Event\GameHasFinishedWithWinner;
use Halloween\TrickOrTreat\Domain\Game\Event\GameWasInitialised;
use Halloween\TrickOrTreat\Domain\Game\Event\GameWasStarted;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\Player;
use Halloween\TrickOrTreat\Domain\Game\RoundResults;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\Game
 */
class GameSpec extends ObjectBehavior
{
    private $gameId;

    function let()
    {
        $this->gameId = GameId::generate();
        $this->beConstructedThrough('initializeWithPlayerNames', [$this->gameId, 'Mitchel', 'Petar']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveRecorded(GameWasInitialised::class);
    }

    function it_should_proceed_to_the_next_round_when_both_players_ate_the_meal()
    {
        $this->finishRound(RoundResults::withResults(true, true));
        $this->shouldHaveRecorded(CurrentRoundHasBeenFinished::class);
    }

    function it_should_finish_the_game_with_a_winner_when_one_player_did_not_eat_the_meal()
    {
        $this->finishRound(RoundResults::withResults(false, true));
        $this->shouldHaveRecorded(GameHasFinishedWithWinner::inRound($this->gameId, new Player('Petar'), 1));
    }

    function it_should_finish_the_game_with_a_draw_when_both_players_did_not_eat_the_meal() {
        $this->finishRound(RoundResults::withResults(false, false));
        $this->shouldHaveRecorded(GameHasFinishedWithADraw::inRound($this->gameId, 1));
    }
}