<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
        ],
        // Map middleware -> factories here
        'factories' => [
        ],
    ],

    'routes' => [
        [
            'name' => 'play',
            'path' => '/play',
            'middleware' => \Halloween\TrickOrTreat\App\Action\Play::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'initialise_game',
            'path' => '/initialise-game',
            'middleware' => \Halloween\TrickOrTreat\App\Action\InitialiseGame::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'finish_round',
            'path' => '/finish-round',
            'middleware' => \Halloween\TrickOrTreat\App\Action\FinishRound::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'test',
            'path' => '/test',
            'middleware' => \Halloween\TrickOrTreat\App\Action\Test::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
