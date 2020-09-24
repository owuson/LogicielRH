<?php

namespace App\Controller;

use App\Entity\Employes;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrangeController extends AbstractController
{
    /**
     * @Route("/orange", name="orange")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Employes::class);
        $employes= $repo->findAll();
        return $this->render('orange/index.html.twig', [
            'controller_name' => 'OrangeController', 'employes' => $employes
        ]);
    }

    /**
     * @Route("/", name ="home")
     */

    public function home()
    {
        return $this->render('orange/home.html.twig');
    }

    /** 
     *  @Route ("/orange/new", name="creer_employe")
    */

    public function add(Request $requete, ObjectManager $manager)
    {
        $employes = new Employes();
        $form = $this->createFormBuilder($employes)
                ->add('Nom')
                ->add('Prenom')
                ->add('Age')
                ->add('Adresse')
                // ->add('Date d\'arriver')
                ->add('Echelon')
                ->add('Service')
                ->add('Salaire')
                // ->add('Congés Restant')
                // ->add('save', SubmitType::class, [
                //     'label' => 'Enregistrer'
                // ])
                ->getForm();

        $form->handleRequest($requete);

        if($form->isSubmitted() && $form->isValid())
        {
            $employes->setDateArrive(new \DateTime());

            $manager->persist($employes);
            $manager->flush();

            return $this->redirectToRoute('orange', ['id' => $employes->getId()]);
        }

        return $this->render('orange/ajouter.html.twig', [
            'formEmploye' => $form->createView()
        ]);
    }

    /** 
     *  @Route ("/orange/login", name="login")
    */

    public function login()
    {
        return $this->render('orange/login.html.twig');
    }

    public function delete()
    {
        return $this->render('orange/login.html.twig');
    }
}
