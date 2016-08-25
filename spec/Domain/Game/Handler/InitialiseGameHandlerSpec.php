<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\Command\InitialiseGame;
use Halloween\TrickOrTreat\Domain\Game\Game;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\Handler\InitialiseGameHandler
 */
class InitialiseGameHandlerSpec extends ObjectBehavior
{
    function it_should_initialise_a_new_game(GameRepository $gameRepository) {
        $this->beConstructedWith($gameRepository);

        $gameId = GameId::generate();

        $gameRepository->add(Argument::type(Game::class))->shouldBeCalled();

        $this(InitialiseGame::withPlayers($gameId, 'playerOne', 'playerTwo'));
    }
}