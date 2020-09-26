<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Form\RegistrationType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/security/inscription", name="security_inscription")
     */


    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $users = new Users();
        $form = $this->createForm(RegistrationType::class, $users);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($users, $users->getPassword());

            $users->setPassword($hash); 

            $manager->persist($users);
            $manager->flush();
        }

        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/security/login", name="page_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }
}
