<?php
namespace Halloween\TrickOrTreat\Container\App\Action;
use Interop\Container\ContainerInterface;
use Halloween\TrickOrTreat\App\Action\NewGame;
use Zend\Expressive\Template\TemplateRendererInterface;
/**
 * Class HomeFactory
 *
 * @package Prooph\ProophessorDo\Container\App\Action
 */
final class NewGameFactory
{
    /**
     * @param ContainerInterface $container
     * @return NewGame
     */
    public function __invoke(ContainerInterface $container)
    {
        return new NewGame($container->get(TemplateRendererInterface::class));
    }
}