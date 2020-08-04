<?php

namespace App\Controller; 

use App\Repository\ShowRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    /**
     * @Route("/show", name="show") 
     */
    public function index(ShowRepository $repo)
    {   
        $shows = $repo->findAll();

        return $this->render('show/index.html.twig', [
            'shows' => $shows,
        ]);
    }

    /**
     * @Route("/show/{id}", name="show_show")
     */
    public function show($id, ShowRepository $repo)
    {   
        $show = $repo->find($id);

        $collaborateurs = [];

        foreach($show->getArtistTypes() as $at){
            $collaborateurs[$at->getType()->getType()][] = $at->getArtist();
        }

        return $this->render('show/show.html.twig', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);
    }
}
