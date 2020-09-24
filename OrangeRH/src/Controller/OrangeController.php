<?php

namespace App\Controller;

use App\Entity\Employes;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Builder\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrangeController extends AbstractController
{
    /**
     * @Route("/orange/listeemploye", name="orange")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Employes::class);
        $employes= $repo->findAll();
        return $this->render('orange/listeEmploye.html.twig', [
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
     *  @Route ("/orange/employe/new", name="creer_employe")
     * @Route ("/orange/{id}/edit", name="modifier_employe")
    */

    public function form(Employes $employes = null, Request $requete, ObjectManager $manager)
    {
        if(!$employes){

            $employes = new Employes();

        }
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
            if(!$employes->getId())
            {
                $employes->setDateArrive(new \DateTime());
            }
            

            $manager->persist($employes);
            $manager->flush();

            return $this->redirectToRoute('orange', ['id' => $employes->getId()]);
        }

        return $this->render('orange/ajouter.html.twig', [
            'formEmploye' => $form->createView(),
            'modifEmploye' => $employes -> getId() !== null
        ]);
    }

    /** 
     *  @Route ("/orange/login", name="login")
    */

    public function login()
    {
        return $this->render('orange/login.html.twig');
    }

    /** 
     *  @Route ("/orange/employe/suppression", name="supprimer_employe", methods = "DELETE")
    */

    public function delete(Property $property)
    {

    }
}
