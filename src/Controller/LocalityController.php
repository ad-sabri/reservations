<?php 

namespace App\Controller;

use App\Repository\LocalityRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocalityController extends AbstractController
{
    /**
     * @Route("/locality", name="locality")
     */
    public function index(LocalityRepository $repo)
    {
        $localities = $repo->findAll();

        return $this->render('locality/index.html.twig', [
            'localities' => $localities,
        ]);
    }

    /**
     * @Route("/locality/{id}", name="locality_show")
     */
    public function show($id, LocalityRepository $repo)
    {
        $locality = $repo->find($id);

        return $this->render('locality/show.html.twig', [
            'locality' => $locality,
        ]);
    }


}
