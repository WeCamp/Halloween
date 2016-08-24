<?php

namespace Halloween\TrickOrTreat\Container\App\Action;

use Halloween\TrickOrTreat\App\Action\Home;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;

final class HomeFactory
{
    /**
     * @param ContainerInterface $container
     * @return Home
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Home($container->get(CommandBus::class));
    }
}
