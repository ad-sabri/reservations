<?php

namespace App\Controller;

use App\Repository\RepresentationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepresentationController extends AbstractController
{
    /**
     * @Route("/representation", name="representation")
     */
    public function index(RepresentationRepository $repo)
    {
        $representations = $repo->findAll();

        return $this->render('representation/index.html.twig', [
            'representations' =>  $representations,
        ]);
    }

    /**
     * @Route("/representation/{id}", name="show_representation")
     */
    public function show($id, RepresentationRepository $repo)
    {
        $representation = $repo->find($id);

        return $this->render('representation/show.html.twig', [
            'representation' => $representation,
        ]);

    }
    
}
