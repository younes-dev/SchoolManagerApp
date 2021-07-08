<?php

namespace App\Controller;

use App\Entity\Former;
use App\Form\FormerType;
use App\Repository\FormerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/former")
 */
class FormerController extends AbstractController
{
    /**
     * @Route("/", name="former_index", methods={"GET"})
     */
    public function index(FormerRepository $formerRepository): Response
    {
        return $this->render('former/index.html.twig', [
            'formers' => $formerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="former_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $former = new Former();
        $form = $this->createForm(FormerType::class, $former);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($former);
            $entityManager->flush();

            return $this->redirectToRoute('former_index');
        }

        return $this->render('former/new.html.twig', [
            'former' => $former,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="former_show", methods={"GET"})
     */
    public function show(Former $former): Response
    {
        return $this->render('former/show.html.twig', [
            'former' => $former,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="former_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Former $former): Response
    {
        $form = $this->createForm(FormerType::class, $former);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('former_index');
        }

        return $this->render('former/edit.html.twig', [
            'former' => $former,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="former_delete", methods={"POST"})
     */
    public function delete(Request $request, Former $former): Response
    {
        if ($this->isCsrfTokenValid('delete'.$former->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($former);
            $entityManager->flush();
        }

        return $this->redirectToRoute('former_index');
    }
}
