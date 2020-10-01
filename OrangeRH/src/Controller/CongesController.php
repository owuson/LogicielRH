<?php

namespace App\Controller;

use App\Entity\Conges;
use App\Form\Conges1Type;
use App\Repository\CongesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CongesController extends AbstractController
{
    /**
     * @Route("/conges", name="conges_index", methods={"GET"})
     */
    public function index(CongesRepository $congesRepository): Response
    {
        return $this->render('conges/index.html.twig', [
            'conges' => $congesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/conges/new", name="conges_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conge = new Conges();
        $form = $this->createForm(Conges1Type::class, $conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conge);
            $entityManager->flush();

            return $this->redirectToRoute('conges_index');
        }

        return $this->render('conges/new.html.twig', [
            'conge' => $conge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/conges/{id}", name="conges_show", methods={"GET"})
     */
    public function show(Conges $conge): Response
    {
        return $this->render('conges/show.html.twig', [
            'conge' => $conge,
        ]);
    }

    /**
     * @Route("/conges/{id}/edit", name="conges_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Conges $conge): Response
    {
        $form = $this->createForm(Conges1Type::class, $conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conges_index');
        }

        return $this->render('conges/edit.html.twig', [
            'conge' => $conge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/congesdelete/{id}", name="conges_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Conges $conge): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conge->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conge);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conges_index');
    }
}
