<?php

namespace Halloween\TrickOrTreat\Container\App\Action;

use Halloween\TrickOrTreat\App\Action\FinishRound;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;

final class FinishRoundFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return FinishRound
     */
    public function __invoke(ContainerInterface $container)
    {
        return new FinishRound($container->get(CommandBus::class));
    }
}
