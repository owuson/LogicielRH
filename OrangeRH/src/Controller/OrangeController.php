<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Entity\Conges;
use App\Entity\Message;
use App\Entity\Licenciement;
use App\Entity\FicheDePaie;
use App\Form\CongesType;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Builder\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrangeController extends AbstractController
{
    /**
     * @Route("/orange/listeemploye", name="orange")
     */
    public function listEmploye()
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
 * @Route("/orange/employes/delete/{id<\d+>}", name="supprimer
 * _employe")
 */
    public function delete(Request $request, Employes $employes)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($employes);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('/orange/listeemploye');
    }

    /**
     * @Route("/orange/listeconges", name="conge")
     */
    public function listConges()
    {
        $repo = $this->getDoctrine()->getRepository(Conges::class);
        $conges = $repo->findAll();
        return $this->render('orange/conges.html.twig', [
            'controller_name' => 'OrangeController', 'conges' => $conges
        ]);
    }

    /**
     * @Route("/orange/demandeconges", name="demandeConge")
     */
    public function demandeConges(Conges $conges = null, Request $requete, ObjectManager $manager)
    {
        if(!$conges){

            $employes = new Conges();

        }
        $form = $this->createFormBuilder($conges)
                ->add('dateDemande')
                ->add('jourDemande')           
                ->add('employes')
                ->getForm();

        $form->handleRequest($requete);

        if($form->isSubmitted() && $form->isValid())
        {   

            $manager->persist($conges);
            $manager->flush();

            // return $this->redirectToRoute('orange', ['id' => $employes->getId()]);
        }

        return $this->render('orange/demandeConge.html.twig', [
            'formConges' => $form->createView(),
        ]);
    }

    /**
     * @Route("/orange/statistique", name ="stat")
     */

    public function statistique()
    {
        return $this->render('orange/statistique.html.twig');
    }

    /**
     * @Route("/orange/messages", name ="message")
     */

    public function messages()
    {
        return $this->render('orange/messagerie.html.twig');
    }

    /**
     * @Route("/orange/candidature", name ="candidature")
     */

    public function candidature()
    {
        return $this->render('orange/candidature.html.twig');
    }
}
