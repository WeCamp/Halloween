<?php

namespace Halloween\TrickOrTreat\Container\Domain\Game\Handler;

use Halloween\TrickOrTreat\Domain\Game\GameRepository;
use Halloween\TrickOrTreat\Domain\Game\Handler\InitialiseGameHandler;
use Interop\Container\ContainerInterface;

final class InitialiseGameHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return InitialiseGameHandler
     */
    public function __invoke(ContainerInterface $container)
    {
        return new InitialiseGameHandler($container->get(GameRepository::class));
    }
}
