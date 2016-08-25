<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Event\GameWasInitialised;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\Game
 */
class GameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $gameId = GameId::generate();
        $this->beConstructedThrough('initializeWithPlayerNames', [$gameId, 'Mitchel', 'Petar']);

        $this->shouldHaveRecorded(GameWasInitialised::class);
    }
}