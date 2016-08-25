<?php

namespace Halloween\TrickOrTreat\Domain\Game;

use Rhumsaa\Uuid\Uuid;

final class GameId
{
    /**
     * @var Uuid
     */
    private $uuid;

    /**
     * @return GameId
     */
    public static function generate()
    {
        return new self(Uuid::uuid4());
    }

    /**
     * @param $gameId
     *
     * @return GameId
     */
    public static function fromString($gameId)
    {
        return new self(Uuid::fromString($gameId));
    }

    /**
     * @param Uuid $uuid
     */
    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->uuid->toString();
    }

    /**
     * @param GameId $other
     *
     * @return bool
     */
    public function sameValueAs(GameId $other)
    {
        return $this->toString() === $other->toString();
    }
}