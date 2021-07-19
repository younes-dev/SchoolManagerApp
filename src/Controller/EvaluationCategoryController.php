<?php

namespace App\Controller;

use App\Entity\EvaluationCategory;
use App\Form\EvaluationCategoryType;
use App\Repository\EvaluationCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evaluation/category")
 */
class EvaluationCategoryController extends AbstractController
{
    /**
     * @Route("/", name="evaluation_category_index", methods={"GET"})
     */
    public function index(EvaluationCategoryRepository $evaluationCategoryRepository): Response
    {
        return $this->render('evaluation_category/index.html.twig', [
            'evaluation_categories' => $evaluationCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="evaluation_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evaluationCategory = new EvaluationCategory();
        $form = $this->createForm(EvaluationCategoryType::class, $evaluationCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluationCategory);
            $entityManager->flush();

            return $this->redirectToRoute('evaluation_category_index');
        }

        return $this->render('evaluation_category/new.html.twig', [
            'evaluation_category' => $evaluationCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_category_show", methods={"GET"})
     */
    public function show(EvaluationCategory $evaluationCategory): Response
    {
        return $this->render('evaluation_category/show.html.twig', [
            'evaluation_category' => $evaluationCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="evaluation_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EvaluationCategory $evaluationCategory): Response
    {
        $form = $this->createForm(EvaluationCategoryType::class, $evaluationCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evaluation_category_index');
        }

        return $this->render('evaluation_category/edit.html.twig', [
            'evaluation_category' => $evaluationCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_category_delete", methods={"POST"})
     */
    public function delete(Request $request, EvaluationCategory $evaluationCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluationCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evaluationCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evaluation_category_index');
    }
}
