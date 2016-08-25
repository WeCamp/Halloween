<?php

namespace Halloween\TrickOrTreat\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\Command\InitialiseGame;
use Halloween\TrickOrTreat\Domain\Game\Game;
use Halloween\TrickOrTreat\Domain\Game\GameRepository;

class InitialiseGameHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function __invoke(InitialiseGame $command)
    {
        $game = Game::initializeWithPlayerNames($command->gameId(), $command->playerOne(), $command->playerTwo());
        $this->gameRepository->add($game);
    }
}
