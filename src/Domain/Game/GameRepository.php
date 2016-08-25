<?php

namespace Halloween\TrickOrTreat\Domain\Game;

interface GameRepository
{
    public function add(Game $game);

    /**
     * @param GameId $gameId
     *
     * @return Game
     */
    public function get(GameId $gameId);
}