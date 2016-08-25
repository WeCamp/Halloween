<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\Command\FinishRound;
use Halloween\TrickOrTreat\Domain\Game\Game;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use Halloween\TrickOrTreat\Domain\Game\RoundResults;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\Handler\FinishRoundHandler
 */
class FinishRoundHandlerSpec extends ObjectBehavior
{
    function it_should_finish_a_round_of_the_given_game(GameRepository $gameRepository)
    {
        $this->beConstructedWith($gameRepository);

        $gameId = GameId::generate();

        $game = Game::initializeWithPlayerNames($gameId, 'Petar', 'Mitchel');

        $gameRepository->get($gameId)->willReturn($game);

        $this(FinishRound::withPlayers($gameId, true, true));
    }
}