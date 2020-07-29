<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index(LocationRepository $repo)
    {
        $locations = $repo->findAll();

        return $this->render('location/index.html.twig', [
            'locations' => $locations,
            'controller_name' => 'LocationController',
        ]);
    }

    /**
     * @Route("/location/{id}", name="location_show")
     */
    public function show($id, LocationRepository $repo)
    {
        $location = $repo->find($id);

        return $this->render('location/show.html.twig', [
            'location' => $location,
            'controller_name' => 'LocationController',
        ]);
    }
}
