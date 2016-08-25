<?php
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => ApplicationFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            // Middleware
            \Halloween\TrickOrTreat\App\Action\Home::class => \Halloween\TrickOrTreat\Container\App\Action\HomeFactory::class,
            // App Stuff
            \Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients::class => \Halloween\TrickOrTreat\Container\Infrastructure\Ingredient\EventStoreAvailableIngredientsFactory::class,
            \Halloween\TrickOrTreat\Domain\Ingredient\Handler\AddIngredientHandler::class => \Halloween\TrickOrTreat\Container\Domain\Ingredient\AddIngredientHandlerFactory::class
        ],
    ],
];

