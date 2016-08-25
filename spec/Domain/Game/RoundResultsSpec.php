<?php

namespace spec\Halloween\TrickOrTreat\Domain\Game;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Game\RoundResults
 */
class RoundResultsSpec extends ObjectBehavior
{
    function it_should_know_the_results_of_both_players()
    {
        $this->beConstructedThrough('withResults', [true, false]);

        $this->playerOneResult()->shouldBe(true);
        $this->playerTwoResult()->shouldBe(false);
    }
}