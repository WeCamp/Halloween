<?php

namespace Halloween\TrickOrTreat\App;

class ImageFixture
{
    public static function get($number)
    {
        $id = 0;
        return array_rand([
            [
                'id'   => $id++,
                'name' => 'Disgusting Ox Ball',
                'url'  => '/assets/img/ingredients/ballofox.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Ozonian Bug',
                'url'  => '/assets/img/ingredients/bug1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Zagrainian Bug',
                'url'  => '/assets/img/ingredients/bug2.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting 150 Legged Centipede',
                'url'  => '/assets/img/ingredients/centipede1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Hard Shell African Centipede',
                'url'  => '/assets/img/ingredients/centipede2.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting American Cocroach',
                'url'  => '/assets/img/ingredients/cocroach1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Surprise Eyeball Mix',
                'url'  => '/assets/img/ingredients/eyes.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Amazonian Frog',
                'url'  => '/assets/img/ingredients/frog.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Tree Frog Intestines',
                'url'  => '/assets/img/ingredients/froginternals.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Stinging Larvae',
                'url'  => '/assets/img/ingredients/larvae1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Mild Larvae',
                'url'  => '/assets/img/ingredients/larvae2.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Mother of All Breeders',
                'url'  => '/assets/img/ingredients/motherbreeder.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Ramon Holding A Disgusting Book',
                'url'  => '/assets/img/ingredients/ramon1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Rocky Mountain Oysters',
                'url'  => '/assets/img/ingredients/Rocky-Mountain-Oysters.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Fatty Worms',
                'url'  => '/assets/img/ingredients/SlowWorms_4620.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Fat Slug',
                'url'  => '/assets/img/ingredients/slug1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Surprise',
                'url'  => '/assets/img/ingredients/smth1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Eight Legged Friend',
                'url'  => '/assets/img/ingredients/spider1.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Another Disgusting 8 Legged Friend',
                'url'  => '/assets/img/ingredients/spider2.jpg',
            ],
            [
                'id'   => $id++,
                'name' => 'Disgusting Strange Thing',
                'url'  => '/assets/img/ingredients/strangething.jpg',
            ],
        ], $number);
    }
}