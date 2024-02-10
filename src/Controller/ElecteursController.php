<?php

namespace App\Controller;

use App\Entity\Electeurs;
use App\Form\ElecteursType;
use App\Repository\ElecteursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/electeurs')]
class ElecteursController extends AbstractController
{
    #[Route('/', name: 'app_electeurs_index', methods: ['GET'])]
    public function index(ElecteursRepository $electeursRepository): Response
    {
        return $this->render('electeurs/index.html.twig', [
            'electeurs' => $electeursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_electeurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $electeur = new Electeurs();
        $form = $this->createForm(ElecteursType::class, $electeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($electeur);
            $entityManager->flush();

            return $this->redirectToRoute('app_electeurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('electeurs/new.html.twig', [
            'electeur' => $electeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electeurs_show', methods: ['GET'])]
    public function show(Electeurs $electeur): Response
    {
        return $this->render('electeurs/show.html.twig', [
            'electeur' => $electeur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_electeurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Electeurs $electeur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElecteursType::class, $electeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_electeurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('electeurs/edit.html.twig', [
            'electeur' => $electeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electeurs_delete', methods: ['POST'])]
    public function delete(Request $request, Electeurs $electeur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$electeur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($electeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_electeurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
