<?php

namespace App\DataFixtures;

use App\Entity\Locality;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LocalityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $localities = [
            [
                'postalCode'=>'1000', 
                'locality'=>'Bruxelles',
            ],

            [
                'postalCode'=>'1020', 
                'locality'=>'Laeken',
            ],

            [
                'postalCode'=>'1030', 
                'locality'=>'Schaerbeek',
            ],

            [
                'postalCode'=>'1050', 
                'locality'=>'Ixelles',
            ],

            [
                'postalCode'=>'1170', 
                'locality'=>'Watermael-Boitsfort',
            ],
        ];

        foreach($localities as $record)
        {
            $locality = new Locality();
            $locality->setPostalCode($record['postalCode']);
            $locality->setLocality($record['locality']);

            $manager->persist($locality);
        }

        $manager->flush();
    }
}
