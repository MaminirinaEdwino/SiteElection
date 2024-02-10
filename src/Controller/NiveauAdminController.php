<?php

namespace App\Controller;

use App\Entity\NiveauAdmin;
use App\Form\NiveauAdminType;
use App\Repository\NiveauAdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/niveau/admin')]
class NiveauAdminController extends AbstractController
{
    #[Route('/', name: 'app_niveau_admin_index', methods: ['GET'])]
    public function index(NiveauAdminRepository $niveauAdminRepository): Response
    {
        return $this->render('niveau_admin/index.html.twig', [
            'niveau_admins' => $niveauAdminRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_niveau_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $niveauAdmin = new NiveauAdmin();
        $form = $this->createForm(NiveauAdminType::class, $niveauAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($niveauAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('app_niveau_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('niveau_admin/new.html.twig', [
            'niveau_admin' => $niveauAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_niveau_admin_show', methods: ['GET'])]
    public function show(NiveauAdmin $niveauAdmin): Response
    {
        return $this->render('niveau_admin/show.html.twig', [
            'niveau_admin' => $niveauAdmin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_niveau_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NiveauAdmin $niveauAdmin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NiveauAdminType::class, $niveauAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_niveau_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('niveau_admin/edit.html.twig', [
            'niveau_admin' => $niveauAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_niveau_admin_delete', methods: ['POST'])]
    public function delete(Request $request, NiveauAdmin $niveauAdmin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$niveauAdmin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($niveauAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_niveau_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
