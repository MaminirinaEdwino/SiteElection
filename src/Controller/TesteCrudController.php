<?php

namespace App\Controller;

use App\Entity\TesteCrud;
use App\Form\TesteCrudType;
use App\Repository\TesteCrudRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/teste/crud')]
class TesteCrudController extends AbstractController
{
    #[Route('/', name: 'app_teste_crud_index', methods: ['GET'])]
    public function index(TesteCrudRepository $testeCrudRepository): Response
    {
        return $this->render('teste_crud/index.html.twig', [
            'teste_cruds' => $testeCrudRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_teste_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $testeCrud = new TesteCrud();
        $form = $this->createForm(TesteCrudType::class, $testeCrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($testeCrud);
            $entityManager->flush();

            return $this->redirectToRoute('app_teste_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teste_crud/new.html.twig', [
            'teste_crud' => $testeCrud,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teste_crud_show', methods: ['GET'])]
    public function show(TesteCrud $testeCrud): Response
    {
        return $this->render('teste_crud/show.html.twig', [
            'teste_crud' => $testeCrud,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_teste_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TesteCrud $testeCrud, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TesteCrudType::class, $testeCrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_teste_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teste_crud/edit.html.twig', [
            'teste_crud' => $testeCrud,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teste_crud_delete', methods: ['POST'])]
    public function delete(Request $request, TesteCrud $testeCrud, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$testeCrud->getId(), $request->request->get('_token'))) {
            $entityManager->remove($testeCrud);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_teste_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
