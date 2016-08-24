<?php

namespace Halloween\TrickOrTreat\PhpSpec\Matcher;

use PhpSpec\Matcher\MatchersProviderInterface;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Prooph\EventSourcing\EventStoreIntegration\AggregateRootDecorator;

class AggregateChangedRecorderMatcher implements MatchersProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getMatchers()
    {
        $itWasRecorded = function (AggregateRoot $recorder, $expectedEvent) {

            $decorator = AggregateRootDecorator::newInstance();
            $events = $decorator->extractRecordedEvents($recorder);
            if ($expectedEvent instanceof AggregateChanged) {
                foreach ($events as $recordedEvent) {
                    if ($recordedEvent instanceof $expectedEvent
                        && $expectedEvent->aggregateId() == $recordedEvent->aggregateId()
                        && $expectedEvent->payload() == $recordedEvent->payload()
                    ) {
                        return true;
                    }
                }
            }

            if (is_string($expectedEvent)) {
                foreach ($events as $recordedEvent) {
                    if ($recordedEvent instanceof $expectedEvent) {
                        return true;
                    }
                }
            }

            return false;
        };

        return [
            'haveRecorded' =>
                function (AggregateRoot $recorder, $expectedEvent) use ($itWasRecorded) {
                    return $itWasRecorded($recorder, $expectedEvent);
                },
            'haveNotRecorded' =>
                function (AggregateRoot $recorder, $expectedEvent) use ($itWasRecorded) {
                    return !$itWasRecorded($recorder, $expectedEvent);
                },
        ];
    }
}