<?php

namespace Halloween\TrickOrTreat\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\Command\FinishRound;
use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use Halloween\TrickOrTreat\Domain\Game\RoundResults;

class FinishRoundHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * @param FinishRound $command
     */
    public function __invoke(FinishRound $command)
    {
        $game = $this->gameRepository->get($command->gameId());
        $game->finishRound(RoundResults::withResults($command->playerOneResult(), $command->playerTwoResult()));
    }
}
