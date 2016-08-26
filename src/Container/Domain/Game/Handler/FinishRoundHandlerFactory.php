<?php

namespace Halloween\TrickOrTreat\Container\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use Halloween\TrickOrTreat\Domain\Game\Handler\FinishRoundHandler;
use Interop\Container\ContainerInterface;

final class FinishRoundHandlerFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return FinishRoundHandler()
     */
    public function __invoke(ContainerInterface $container)
    {
        return new FinishRoundHandler($container->get(GameRepository::class));
    }
}
