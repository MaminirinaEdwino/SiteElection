<?php

namespace App\Controller;

use App\Entity\NiveauElection;
use App\Form\NiveauElectionType;
use App\Repository\NiveauElectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/niveau/election')]
class NiveauElectionController extends AbstractController
{
    #[Route('/', name: 'app_niveau_election_index', methods: ['GET'])]
    public function index(NiveauElectionRepository $niveauElectionRepository): Response
    {
        return $this->render('niveau_election/index.html.twig', [
            'niveau_elections' => $niveauElectionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_niveau_election_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $niveauElection = new NiveauElection();
        $form = $this->createForm(NiveauElectionType::class, $niveauElection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($niveauElection);
            $entityManager->flush();

            return $this->redirectToRoute('app_niveau_election_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('niveau_election/new.html.twig', [
            'niveau_election' => $niveauElection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_niveau_election_show', methods: ['GET'])]
    public function show(NiveauElection $niveauElection): Response
    {
        return $this->render('niveau_election/show.html.twig', [
            'niveau_election' => $niveauElection,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_niveau_election_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NiveauElection $niveauElection, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NiveauElectionType::class, $niveauElection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_niveau_election_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('niveau_election/edit.html.twig', [
            'niveau_election' => $niveauElection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_niveau_election_delete', methods: ['POST'])]
    public function delete(Request $request, NiveauElection $niveauElection, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$niveauElection->getId(), $request->request->get('_token'))) {
            $entityManager->remove($niveauElection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_niveau_election_index', [], Response::HTTP_SEE_OTHER);
    }
}
