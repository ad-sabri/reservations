<?php

namespace App\DataFixtures; 

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtistTypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $artistTypes = [
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Philipe',
                'artist_lastname'=>'Laurent',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type' => 'scénographe',
            ],
            [
                'artist_firstname'=>'Philipe',
                'artist_lastname'=>'Laurent',
                'type' => 'scénographe',
            ],
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Maruis',
                'artist_lastname'=>'Von Mayenberg',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Olivier',
                'artist_lastname'=>'Boudon',
                'type' => 'scénographe',
            ],
            [
                'artist_firstname'=>'Anne Marie',
                'artist_lastname'=>'Loop',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Pietro',
                'artist_lastname'=>'Varasso',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Laurent',
                'artist_lastname'=>'Caron',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Elena',
                'artist_lastname'=>'Perez',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Guillaume',
                'artist_lastname'=>'Alexandre',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Claude',
                'artist_lastname'=>'Semal',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Laurence',
                'artist_lastname'=>'Warin',
                'type' => 'scénographe',
            ],
            [
                'artist_firstname'=>'Claude',
                'artist_lastname'=>'Semal',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Pierre',
                'artist_lastname'=>'Wayburn',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Gwendoline',
                'artist_lastname'=>'Gauthier',
                'type' => 'auteur',
            ],
            [
                'artist_firstname'=>'Pierre',
                'artist_lastname'=>'Wayburn',
                'type' => 'comédien',
            ],
            [
                'artist_firstname'=>'Gwendoline',
                'artist_lastname'=>'Gauthier',
                'type' => 'comédien', 
            ],    
        ];

        foreach($artistTypes as $record) 
        {
            $artist = $this->getReference($record['artist_firstname'].'-'.$record['artist_lastname']);

            $type = $this->getReference($record['type']);

            $artist->addType($type);

            $manager->persist($artist);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [
            ArtistFixtures::class,
            TypeFixtures::class,

        ];
    }
}
