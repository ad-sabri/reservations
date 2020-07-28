<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LocalityController extends AbstractController
{
    /**
     * @Route("/locality", name="locality")
     */
    public function index()
    {
        return $this->render('locality/index.html.twig', [
            'controller_name' => 'LocalityController',
        ]);
    }
}
