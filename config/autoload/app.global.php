<?php
/*
 * This file is part of prooph/proophessor.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 9/6/15 - 5:07 PM
 */
return [
    'prooph' => [
        'middleware' => [
            'query' => [
                'response_strategy' => \Halloween\TrickOrTreat\Response\JsonResponse::class,
                'message_factory' => \Prooph\Common\Messaging\FQCNMessageFactory::class,
            ],
            'command' => [
                'message_factory' => \Prooph\Common\Messaging\FQCNMessageFactory::class,
            ],
            'event' => [
                'message_factory' => \Prooph\Common\Messaging\FQCNMessageFactory::class,
            ],
            'message' => [
//                'response_strategy' => \Prooph\ProophessorDo\Response\JsonResponse::class,
                'message_factory' => \Prooph\Common\Messaging\FQCNMessageFactory::class,
            ],
        ],
//        'event_store' => [
//            'plugins' => [
//                \Prooph\EventStoreBusBridge\EventPublisher::class,
//                \Prooph\EventStoreBusBridge\TransactionManager::class,
//            ],
//            //Repository configuration for EventStoreTodoList
//            'todo_list' => [
//                'repository_class' => \Prooph\ProophessorDo\Infrastructure\Repository\EventStoreTodoList::class,
//                'aggregate_type' => \Prooph\ProophessorDo\Model\Todo\Todo::class,
//                'aggregate_translator' => \Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator::class,
//            ],
//            'user_collection' => [
//                'repository_class' => \Prooph\ProophessorDo\Infrastructure\Repository\EventStoreUserCollection::class,
//                'aggregate_type' => \Prooph\ProophessorDo\Model\User\User::class,
//                'aggregate_translator' => \Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator::class
//            ],
//        ],
        'service_bus' => [
            'command_bus' => [
                'router' => [
                    'routes' => [
                        \Halloween\TrickOrTreat\Domain\Ingredient\Command\AddIngredient::class => \Halloween\TrickOrTreat\Domain\Ingredient\Handler\AddIngredientHandler::class
                    ],
                ],
            ],
            'event_bus' => [
                'plugins' => [
                    \Prooph\ServiceBus\Plugin\InvokeStrategy\OnEventStrategy::class
                ],
                'router' => [
                    'routes' => [
//                        \Prooph\ProophessorDo\Model\Todo\Event\TodoWasMarkedAsDone::class => [
//                            \Prooph\ProophessorDo\Projection\Todo\TodoProjector::class,
//                            \Prooph\ProophessorDo\Projection\User\UserProjector::class,
//                        ],
                    ],
                ],
            ],
        ],
    ],
];
