<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Entity\Conges;
use App\Entity\Message;
use App\Entity\Licenciement;
use App\Entity\FicheDePaie;
use App\Form\CongesType;
use App\Repository\MessageRepository;
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
     * @Route("/", name ="home")
     */

    public function home()
    {
        return $this->render('orange/home.html.twig');
    }

    /**
     * @Route("/statistiques", name ="statistiques")
     */
    public function statistique()
    {
        return $this->render('orange/statistique.html.twig');
    }

    /**
     * @Route("/candidature", name ="candidature")
     */

    public function candidature()
    {
        return $this->render('orange/candidature.html.twig');
    }
}
