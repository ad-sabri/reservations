<?php

namespace App\DataFixtures;

use App\Entity\Location;
use Cocur\Slugify\Slugify;
use App\DataFixtures\LocalityFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LocationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $locations = [
            [
                'slug'=>null,
                'designation'=>'Espace Delvaux / La Vénerie',
                'address'=>'3, Rue Gratès',
                'locality' => 'Watermael-Boitsfort',
                'website'=>'https://www.lavenerie.be',
                'phone'=>'+32 (0)2/663.85.50',
            ],

            [
                'slug'=>null,
                'designation'=>'Dexia Art Center',
                'address'=>'50, Rue de l\'Ecuyer',
                'locality' => 'Bruxelles',
                'website'=>null,
                'phone'=>null,
            ],

            [
                'slug'=>null,
                'designation'=>'La Samaritaine',
                'address'=>'16, Rue de la Samaritaine',
                'locality' =>'Bruxelles',
                'website'=>'https://www.lasamaritaine.be',
                'phone'=>null,
            ],

            [
                'slug'=>null,
                'designation'=>'Espace Magh',
                'address'=>'17, Rue du Poinçon',
                'locality' => 'Bruxelles',
                'website'=>'https://www.espacemagh.be',
                'phone'=>'+32 (0)2/274.05.10',
            ],
        ];

        foreach($locations as $record) 
        {
            $slugify = new Slugify();
            
            $location = new Location();
            $location->setSlug($slugify->slugify($record['designation']));
            $location->setDesignation($record['designation']);
            $location->setAddress($record['address']);
            $location->setLocality($this->getReference($record['locality']));
            $location->setWebsite($record['website']);
            $location->setPhone($record['phone']); 

            $manager->persist($location); 

            $this->addReference($location->getSlug(), $location);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [
            LocalityFixtures::class,
        ];
    }
}
