<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ElectionFokotanyController extends AbstractController
{
    #[Route('/election/fokotany', name: 'app_election_fokotany')]
    public function index(): Response
    {
        return $this->render('election_fokotany/index.html.twig', [
            'controller_name' => 'ElectionFokotanyController',
        ]);
    }
}
