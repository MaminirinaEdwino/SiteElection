<?php

namespace App\Controller;

use App\Entity\Fokotany;
use App\Form\FokotanyType;
use App\Repository\CommuneRepository;
use App\Repository\DistrictRepository;
use App\Repository\FokotanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fokotany')]
class FokotanyController extends AbstractController
{
    #[Route('/', name: 'app_fokotany_index', methods: ['GET'])]
    public function index(FokotanyRepository $fokotanyRepository): Response
    {
        return $this->render('fokotany/index.html.twig', [
            'fokotanies' => $fokotanyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fokotany_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fokotany = new Fokotany();
        $form = $this->createForm(FokotanyType::class, $fokotany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fokotany);
            $entityManager->flush();

            return $this->redirectToRoute('app_fokotany_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fokotany/new.html.twig', [
            'fokotany' => $fokotany,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fokotany_show', methods: ['GET'])]
    public function show(Fokotany $fokotany, CommuneRepository $communeRepository, DistrictRepository $districtRepository): Response
    {
        return $this->render('fokotany/show.html.twig', [
            'fokotany' => $fokotany,
            'commune'=> $communeRepository->findAll(),
            'ditrict'=> $districtRepository->findAll()
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fokotany_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fokotany $fokotany, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FokotanyType::class, $fokotany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fokotany_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fokotany/edit.html.twig', [
            'fokotany' => $fokotany,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fokotany_delete', methods: ['POST'])]
    public function delete(Request $request, Fokotany $fokotany, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fokotany->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fokotany);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fokotany_index', [], Response::HTTP_SEE_OTHER);
    }
}
