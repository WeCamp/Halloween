<?php
namespace Halloween\TrickOrTreat\Container\App\Action;
use Interop\Container\ContainerInterface;
use Halloween\TrickOrTreat\App\Action\Play;
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
     * @return Play
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Play($container->get(TemplateRendererInterface::class));
    }
}