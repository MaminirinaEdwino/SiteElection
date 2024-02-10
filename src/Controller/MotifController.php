<?php

namespace App\Controller;

use App\Entity\Motif;
use App\Form\MotifType;
use App\Repository\MotifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/motif')]
class MotifController extends AbstractController
{
    #[Route('/', name: 'app_motif_index', methods: ['GET'])]
    public function index(MotifRepository $motifRepository): Response
    {
        return $this->render('motif/index.html.twig', [
            'motifs' => $motifRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_motif_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $motif = new Motif();
        $form = $this->createForm(MotifType::class, $motif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motif);
            $entityManager->flush();

            return $this->redirectToRoute('app_motif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motif/new.html.twig', [
            'motif' => $motif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motif_show', methods: ['GET'])]
    public function show(Motif $motif): Response
    {
        return $this->render('motif/show.html.twig', [
            'motif' => $motif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_motif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Motif $motif, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MotifType::class, $motif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_motif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motif/edit.html.twig', [
            'motif' => $motif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motif_delete', methods: ['POST'])]
    public function delete(Request $request, Motif $motif, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motif->getId(), $request->request->get('_token'))) {
            $entityManager->remove($motif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_motif_index', [], Response::HTTP_SEE_OTHER);
    }
}
