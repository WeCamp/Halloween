<?php
namespace Halloween\TrickOrTreat\Container\App\Action;
use Interop\Container\ContainerInterface;
use Halloween\TrickOrTreat\App\Action\InitialiseGame;
use Prooph\ServiceBus\CommandBus;

/**
 * Class HomeFactory
 *
 * @package Prooph\ProophessorDo\Container\App\Action
 */
final class InitialiseGameFactory
{
    /**
     * @param ContainerInterface $container
     * @return InitialiseGame
     */
    public function __invoke(ContainerInterface $container)
    {
        return new InitialiseGame($container->get(CommandBus::class));
    }
}
