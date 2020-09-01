<?php

namespace App\Controller;

use App\Form\UserRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    public const LAST_EMAIL = 'app_login_form_last_email';

    /**
     * @Route("/register", name="register", methods={"GET", "POST"})
     */
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(UserRegistrationFormType::class);

        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
             
            $user = $form->getData();

            $plainPassword = $form->get('plainPassword')->getData();
            
            $user->setPassword($passwordEncoder->encodePassword($user, $plainPassword));

            //dd($form->getData());

            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', 'Vous êtes enregistrés !');

            return $this->redirectToRoute('home');

        }
        

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView()

        ]);
    }
    /**
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }
    /**
     * @Route("/logout", name="logout", methods={"GET"})
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the
            logout key on the firewall.');
    }
}