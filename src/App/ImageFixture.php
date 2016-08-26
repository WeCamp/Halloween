<?php

namespace Halloween\TrickOrTreat\App;

class ImageFixture
{
    public static function get($number)
    {
        return array_rand([
            [
                'id' => 1,
                'name' => 'spider',
                'picture' => 'picturelocation_1'
            ],
            [
                'id' => 2,
                'name' => 'eyeball',
                'picture' => 'picturelocation_2'
            ],
            [
                'id' => 2,
                'name' => 'scorpion',
                'picture' => 'picturelocation_3'
            ]
        ], $number);
    }
}