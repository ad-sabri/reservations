<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index(ArtistRepository $repo)
    {
        $artists = $repo->findAll();

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'controller_name' => 'ArtistController',
        ]);
    }

    /**
     * @Route("/artist/{id}", name="artist_show")
    */
    public function show($id, ArtistRepository $repo)
    {
        $artist = $repo->find($id);

        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }
}
