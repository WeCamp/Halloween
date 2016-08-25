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
            'middleware' => \Halloween\TrickOrTreat\App\Action\NewGame::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'sign_in',
            'path' => '/sign-in-names',
            'middleware' => \Halloween\TrickOrTreat\App\Action\SignIn::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'make_ingredient_list',
            'path' => '/make-ingredient-list',
            'middleware' => \Halloween\TrickOrTreat\App\Action\MakeIngredientList::class,
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
