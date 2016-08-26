<?php

namespace Halloween\TrickOrTreat\Container\App\Action;

use Halloween\TrickOrTreat\App\Action\Test;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;

final class TestFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return Test
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Test($container->get(CommandBus::class));
    }
}
