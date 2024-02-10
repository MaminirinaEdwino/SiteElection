<?php

namespace App\Controller;
use App\Entity\Elections;
use App\Form\ElectionRegionType;
use App\Repository\ElectionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/election/region')]
class ElectionRegionController extends AbstractController
{
    #[Route('/', name: 'app_elections_region_index', methods: ['GET'])]
    public function index(ElectionsRepository $electionsRepository): Response
    {
        return $this->render('election_region/index.html.twig', [
            'elections' => $electionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_elections_region_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $election = new Elections();
        $form = $this->createForm(ElectionRegionType::class, $election);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($election);
            $entityManager->flush();

            return $this->redirectToRoute('app_elections_region_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('election_region/new.html.twig', [
            'election' => $election,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elections_region_show', methods: ['GET'])]
    public function show(Elections $election): Response
    {
        return $this->render('election_region/show.html.twig', [
            'election' => $election,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_elections_region_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Elections $election, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElectionRegionType::class, $election);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_elections_region_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('election_region/edit.html.twig', [
            'election' => $election,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elections_region_delete', methods: ['POST'])]
    public function delete(Request $request, Elections $election, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$election->getId(), $request->request->get('_token'))) {
            $entityManager->remove($election);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_elections_region_index', [], Response::HTTP_SEE_OTHER);
    }
}
