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
        // Example:
         [
             'name' => 'home',
             'path' => '/',
             'middleware' => \Halloween\TrickOrTreat\App\Action\Home::class,
             'allowed_methods' => ['GET'],
         ],
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
            'name' => 'make_ingredient_list',
            'path' => '/make-ingredient-list',
            'middleware' => \Halloween\TrickOrTreat\App\Action\MakeIngredientListForRound::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'get_ingredients',
            'path' => '/get-ingredient-list',
            'middleware' => \Halloween\TrickOrTreat\App\Action\GetIngredients::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'confirm_finished_dish',
            'path' => '/confirm-finished-dish',
            'middleware' => \Halloween\TrickOrTreat\App\Action\ConfirmFinishedDish::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'confirm_finished_dish',
            'path' => '/confirm-did-not-finished-dish',
            'middleware' => \Halloween\TrickOrTreat\App\Action\ConfirmDidNotFinishedDish::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'init_ingredients',
            'path' => '/initialize-ingredients',
            'middleware' => \Halloween\TrickOrTreat\App\Action\ConfirmDidNotFinishedDish::class,
            'allowed_methods' => ['POST'],
        ],
    ],
];
