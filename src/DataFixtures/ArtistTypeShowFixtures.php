<?php

namespace App\DataFixtures;

use App\DataFixtures\ShowFixtures;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ArtistTypeFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtistTypeShowFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $artistTypeShows = [
            [
                'artist_firstname' => 'Daniel',
                'artist_lastname' => 'Marcelin',
                'type' => 'auteur',
                'show_slug' => 'ayiti',
            ],
            [
                'artist_firstname' => 'Philipe',
                'artist_lastname' => 'Laurent',
                'type' => 'auteur',
                'show_slug' => 'ayiti',
            ],
            [
                'artist_firstname' => 'Daniel',
                'artist_lastname' => 'Marcelin',
                'type' => 'scénographe',
                'show_slug' => 'ayiti',
            ],
            [
                'artist_firstname' => 'Philipe',
                'artist_lastname' => 'Laurent',
                'type' => 'scénographe',
                'show_slug' => 'ayiti',
            ],
            [
                'artist_firstname' => 'Daniel',
                'artist_lastname' => 'Marcelin',
                'type' => 'comédien',
                'show_slug' => 'ayiti',
            ],
            [
                'artist_firstname' => 'Maruis',
                'artist_lastname' => 'Von Mayenberg',
                'type' => 'auteur',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Olivier',
                'artist_lastname' => 'Boudon',
                'type' => 'scénographe',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Anne Marie',
                'artist_lastname' => 'Loop',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Pietro',
                'artist_lastname' => 'Varasso',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Laurent',
                'artist_lastname' => 'Caron',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Elena',
                'artist_lastname' => 'Perez',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Guillaume',
                'artist_lastname' => 'Alexandre',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'artist_firstname' => 'Claude',
                'artist_lastname' => 'Semal',
                'type' => 'auteur',
                'show_slug' => 'ceci-n-est-pas-un-chanteur-belge',
            ],
            [
                'artist_firstname' => 'Pierre',
                'artist_lastname' => 'Wayburn',
                'type' => 'auteur',
                'show_slug' => 'manneke',
            ],
            [
                'artist_firstname' => 'Gwendoline',
                'artist_lastname' => 'Gauthier',
                'type' => 'auteur',
                'show_slug' => 'manneke',
            ],
            [
                'artist_firstname' => 'Philipe',
                'artist_lastname' => 'Laurent',
                'type' => 'scénographe',
                'show_slug' => 'manneke',
            ],
            [
                'artist_firstname' => 'Pierre',
                'artist_lastname' => 'Wayburn',
                'type' => 'comédien',
                'show_slug' => 'manneke',
            ],
            [
                'artist_firstname' => 'Gwendoline',
                'artist_lastname' => 'Gauthier',
                'type' => 'comédien',
                'show_slug' => 'manneke',
            ],
        ];

        foreach($artistTypeShows as $record) {
            $show = $this->getReference($record['show_slug']);

            $artistType = $this->getReference(
                $record['artist_firstname']
                .'-'.$record['artist_lastname']
                .'-'.$record['type']
            );

            $show->addArtistType($artistType);

            $manager->persist($show);
        }

        $manager->flush();
    }

    public function getDependencies(){
        return[
            ArtistTypeFixtures::class,
            ShowFixtures::class,
        ];
    }
}
