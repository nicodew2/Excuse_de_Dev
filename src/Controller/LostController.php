<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LostController extends AbstractController
{
    #[Route('/lost', name: 'app_lost')]
    public function index(): Response
    {
        //retourne la page lost
        return $this->render('lost/lost.html.twig', [
            'controller_name' => 'LostController',
        ]);
    }
}
