<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game;

use Halloween\TrickOrTreat\Domain\Game\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\Player
 */
class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('Petar');

        $this->name()->shouldReturn('Petar');
    }
}