<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Show;
use Cocur\Slugify\Slugify;


class ShowFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $shows = [
            [
                'slug'=>null, 
                'title'=>'Ayiti',
                'description'=>'Un homme est bloqué à l\'aéroport. 
                    Questionné par les douaniers, il doit justifier son identité',
                'posterUrl'=>'ayiti.jpg',
                'location_slug'=>'espace-delvaux-la-venerie',
                'bookable'=>true,
                'price'=>8.50,
            ],

            [
                'slug'=>null, 
                'title'=>'Cible Mouvante',
                'description'=>'Dans ce thriller d\'anticipation, des adultes semblent alimenter et
                    véhiculer une crainte féroce envers les enfants âgés entre 10-12 ans',
                'posterUrl'=>'cible.jpg',
                'location_slug'=>'dexia-art-center',
                'bookable'=>true,
                'price'=>9.00,
            ],

            [
                'slug'=>null, 
                'title'=>'Ceci n\'est pas un chanteur belge',
                'description'=>'Non peut-être ? Entre Magritte (pour le surréalisme comique)
                    et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose 
                    quatorze nouvelles chansons mêlées à des petits textes humoristiques et 
                    à quelques fortes images poétiques',
                'posterUrl'=>'claudebelgesaison220.jpg',
                'location_slug'=>null,
                'bookable'=>false,
                'price'=>5.50,
            ],

            [
                'slug'=>null, 
                'title'=>'Manneke...!',
                'description'=>'À tour de rôle, Pierre se joue de ses oncles, tantes, grands-parents et 
                    surtout de sa mère',
                'posterUrl'=>'wayburn.jpg',
                'location_slug'=>'la-samaritaine',
                'bookable'=>true,
                'price'=>10.50,
            ],
        ];

        foreach($shows as $record) {
            $slugify = new Slugify();

            $show = new Show();
            $show->setSlug($slugify->slugify($record['title']));
            $show->setTitle($record['title']);
            $show->setDescription($record['description']);
            $show->setPosterUrl($record['posterUrl']);

            if($record['location_slug']) {

                $show->setLocation($this->getReference($record['location_slug']));
            }

            $show->setBookable($record['bookable']);
            $show->setPrice($record['price']);

            $manager->persist($show);
    
        }

        $manager->flush(); 
    }

    public function getDependencies() {

        return [
            LocationFixtures::class,
        ];
    }
}
