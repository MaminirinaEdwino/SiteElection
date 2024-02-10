<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/election/commune')]
class ElectionCommuneController extends AbstractController
{
    #[Route('/', name: 'app_election_commune')]
    public function index(): Response
    {
        return $this->render('election_commune/index.html.twig', [
            'controller_name' => 'ElectionCommuneController',
        ]);
    }
}
