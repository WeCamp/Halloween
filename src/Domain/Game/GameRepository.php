<?php

namespace Halloween\TrickOrTreat\Domain\Game;

interface GameRepository
{
    public function add(Game $game);

    public function get(GameId $gameId);
}