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
            \Halloween\TrickOrTreat\App\Action\Play::class => \Halloween\TrickOrTreat\Container\App\Action\NewGameFactory::class,
            \Halloween\TrickOrTreat\App\Action\InitialiseGame::class => \Halloween\TrickOrTreat\Container\App\Action\InitialiseGameFactory::class,
            \Halloween\TrickOrTreat\App\Action\FinishRound::class => \Halloween\TrickOrTreat\Container\App\Action\FinishRoundFactory::class,
            \Halloween\TrickOrTreat\App\Action\Test::class => \Halloween\TrickOrTreat\Container\App\Action\TestFactory::class,
            // App Stuff
            \Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients::class => \Halloween\TrickOrTreat\Container\Infrastructure\Ingredient\EventStoreAvailableIngredientsFactory::class,
            \Halloween\TrickOrTreat\Domain\Game\GameRepository::class => \Halloween\TrickOrTreat\Container\Infrastructure\Game\EventStoreGameRepositoryFactory::class,
            \Halloween\TrickOrTreat\Domain\Ingredient\Handler\AddIngredientHandler::class => \Halloween\TrickOrTreat\Container\Domain\Ingredient\Handler\AddIngredientHandlerFactory::class,
            \Halloween\TrickOrTreat\Domain\Game\Handler\InitialiseGameHandler::class => \Halloween\TrickOrTreat\Container\Domain\Game\Handler\InitialiseGameHandlerFactory::class,
            \Halloween\TrickOrTreat\Projection\Ingredient\IngredientProjector::class => \Halloween\TrickOrTreat\Container\Projection\Ingredient\IngredientProjectorFactory::class,
            \Halloween\TrickOrTreat\Projection\Game\GameProjector::class => \Halloween\TrickOrTreat\Container\Projection\Game\GameProjectorFactory::class,
            \Halloween\TrickOrTreat\Domain\Game\Handler\FinishRoundHandler::class => \Halloween\TrickOrTreat\Container\Domain\Game\Handler\FinishRoundHandlerFactory::class,
            // Repository Stuff
            \Halloween\TrickOrTreat\Infrastructure\Repository\MongodbGameRepository::class => \Halloween\TrickOrTreat\Container\App\Repository\MongodbGameRepositoryFactory::class
        ],
    ],
];
