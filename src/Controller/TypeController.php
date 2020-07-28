<?php

namespace App\Controller;

use App\Repository\TypeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="type")
     */
    public function index(TypeRepository $repo)
    {
        $types = $repo->findAll();

        return $this->render('type/index.html.twig', [
            'types' => $types,
        ]);
    }

    /**
     * @Route("/type/{id}", name="type_show")
     */
    public function show($id, TypeRepository $repo)
    {
        $type = $repo->find($id);

        return $this->render('type/show.html.twig', [
            'type' => $type,
        ]);
    }
}
