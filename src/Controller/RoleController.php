<?php

namespace App\Controller;

use App\Repository\RoleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoleController extends AbstractController
{
    /**
     * @Route("/role", name="role")
     */
    public function index(RoleRepository $repo)
    {
        $roles = $repo->findAll();
        return $this->render('role/index.html.twig', [
            'roles' => $roles,
        ]);
    }

    /**
     * @Route("/role/{id}", name="show_role")
     */
    public function show($id, RoleRepository $repo)
    {
        $role = $repo->find($id);
        return $this->render('role/show.html.twig', [
            'role' => $role,
        ]);
    }
}
