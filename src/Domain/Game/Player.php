<?php

namespace Halloween\TrickOrTreat\Domain\Game;

class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = (string)$name;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }
}
