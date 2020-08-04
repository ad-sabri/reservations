<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArtistFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $artists = [
            ['firstname'=>'Daniel', 'lastname'=>'Marcelin' ],
            ['firstname'=>'Philipe', 'lastname'=>'Laurent' ],
            ['firstname'=>'Maruis', 'lastname'=>'Von Mayenberg' ], 
            ['firstname'=>'Olivier', 'lastname'=>'Boudon' ],
            ['firstname'=>'Anne Marie', 'lastname'=>'Loop' ],
            ['firstname'=>'Pietro', 'lastname'=>'Varasso' ],
            ['firstname'=>'Laurent', 'lastname'=>'Caron' ],
            ['firstname'=>'Elena', 'lastname'=>'Perez' ],
            ['firstname'=>'Guillaume', 'lastname'=>'Alexandre' ],
            ['firstname'=>'Claude', 'lastname'=>'Semal' ],
            ['firstname'=>'Laurence', 'lastname'=>'Warin' ],
            ['firstname'=>'Pierre', 'lastname'=>'Wayburn' ],
            ['firstname'=>'Gwendoline', 'lastname'=>'Gauthier' ],
        ];

        foreach ($artists as $record) {
            $artist = new Artist();
            $artist->setFirstname($record['firstname']);
            $artist->setLastname($record['lastname']);

            $manager->persist($artist);

            $this->addReference(
                $record['firstname']."-".$record['lastname'],
                $artist
            );
        }

        $manager->flush();
    }
}
