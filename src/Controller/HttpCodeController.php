<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ListeExcuseRepository;

class HttpCodeController extends AbstractController
{
    #[Route('/http/code', name: 'app_http_code')]
    public function index(ListeExcuseRepository $excuseRepository): Response
    {
         // Récupérer une excuse au hasard depuis le repository
         $excuse = $excuseRepository->getRandomExcuse();
        return $this->render('http_code/code.html.twig', [
            'excuse' => $excuse,
        ]);
    }
}
